<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('dashboard');
    }

    public function redirect()
    {
      $user=Auth::user();
      $usertype=$user->usertype;
      
      if($usertype==0)
      {
        //return view('User.home');
        $data=Product::paginate(3);

        $count=Cart::where('phone',$user->phone)->count();
  
        return view('User.home',compact('data', 'count'));
      }
      else{
        return view('admin.home');
      }
    }



    public function search(Request $request)
{ 
    $user = Auth::user();
    $query = $request->input('search');

    if ($query == '') {
        $data = Product::paginate(3);
        $count=Cart::where('phone',$user->phone)->count();
        return view('User.home', compact('data', 'count'));
    }

    $data = Product::where('title', 'like', '%' . $query . '%')
        ->orWhere('description', 'like', '%' . $query . '%')
        ->get();

        $count=Cart::where('phone',$user->phone)->count();

    return view('User.home', compact('data', 'count'));
}


    public function add_to_cart(Request $request,$id)
    {
      if(Auth::id())
      {
        $user=auth()->user();
        $cart=new Cart;
        $cart->name=$user->name;
        $cart->phone=$user->phone;
        $cart->address=$user->address;

        $product=product::find($id);

        $cart->price=$product->price;
        $cart->product_title=$product->title;
        $cart->quantity=$request->quantity;

        $cart->save();
       
        return redirect()->back()->with('message','Product Added to Cart Successfully');
      }
      else{
        return redirect('login');
      }
    }

    public function show_cart()
    { 
      $user=Auth::user();
      $count=Cart::where('phone',$user->phone)->count();
      $data = Cart::all();
      return view('User.show_cart',compact('count','data'));
    }

    public function delete_item($id)
    { 
      $user=Auth::user();
      $count=Cart::where('phone',$user->phone)->count();
      $data = Cart::all();

      $delete_data=Cart::find($id);
      
      //$delete_product_name=$data->title;
      $delete_data->delete();
      return redirect()->back()->with('message', $delete_data->product_title.' has been deleted from your cart');
    }

    public function confirm_order(Request $request)
    { 
       $user=auth()->user();
       $name=$user->name;
       $phone=$user->phone;
       $address=$user->address;
       foreach($request->product_title as $key=>$product_title)
       {
         $order= new Order;
         $order->product_title=$request->product_title[$key];
         $order->product_title=$request->price[$key];
         $order->quantity=$request->quantity[$key];
         $order->name=$name;
         $order->phone=$phone;
         $order->address=$address;
         $order->status='not delivered';
         $order->save();
         
       }

       DB::table('carts')->where('phone',$phone)->delete();
       
       return redirect()->back()->with('message', 'Order has been done successfully');
       

    }


}
