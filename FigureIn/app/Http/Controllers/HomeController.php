<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function redirect(){

        $usertype = Auth::user()->usertype;

        if ($usertype == "1"){
            return view('admin.home');
        }
        else{
            $product=product::paginate(3);
            return view('home.userpage', compact('product'));
        }

    }

    public function index(){
        $product=product::paginate(3);
        return view('home.userpage', compact('product'));
    }

    public function product_details($id){
        $product = product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id){
        if (auth::id()){
            $user = Auth::user();

            $product = product::find($id);

            $cart = new cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->title = $product->title;
            if ($product->discount != null){
                $cart->price = ($product->price - $product->discount)*$request->quantity;
            }
            else{
                $cart->price = $product->price*$request->quantity;
            }
            
            $cart->product_id = $product->id;
            $cart->image = $product->image;

            $cart->quantity = $request->quantity;

            $cart->save();

            return redirect()->back();

        }
        else{
            return redirect('login');
        }
    }

    public function logout(){
        return view('home.logout');
    }

    public function cart(){
        $user = Auth::user();
        $cart = cart::where('user_id','=',$user->id)->get();

        return view('home.cart', compact('cart'));
    }

    public function cart_remove_product($id){
        $product = cart::find($id);
        $product->delete();

        return redirect()->back();
    }

    public function cash_order(){
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();

        foreach($data as $data){
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->title = $data->title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = "Cash on Delivery";
            $order->delivery_status = "Processing";
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        return redirect()->back()->with('message', "Order Placed Successfully!");

    }

    public function stripe($totalprice){
        return view('home.stripe', compact('totalprice'));
    }


    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment" 
        ]);
      
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get(); 
        foreach($data as $data){
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->title = $data->title;
            $order->quantity = $data->quantity;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = "Paid";
            $order->delivery_status = "Processing";
            $order->save();

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }

        
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    public function products(){
        $product=product::all();
        return view('home.products', compact('product'));
    }

    public function delivered($id){
        $order = order::find($id);
        $order->delivery_status = "Delivered";
        if($order->payment_status == 'Cash on Delivery'){
            $order->payment_status = "Paid";
        }
        $order->save();

        return redirect()->back();
    }
}

