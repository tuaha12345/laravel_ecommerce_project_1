<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

use Illuminate\Http\Request;
use function Laravel\Prompts\alert;

class AdminController extends Controller
{
    public function product()
    {
        return view('admin.product');
    }
    public function upload_product(Request $re)
    {
       

          // validate data
        //  $re->validate([
        //         'title' => 'required',
        //         'price' => 'required',
        //         'quantity' => 'required',
        //         'description' => 'required',
        //         'product_image' => 'required|mimes:png,jpg,jpeg,gif|max:100000',
   
        //    ]);


      // upload image file
       $imageName=time().'.'.$re->product_image->extension();
       $re->product_image->move(public_path('product_image'),$imageName);

      $data=new Product;
      
      $data->title=$re->title;
      $data->price=$re->price;
      $data->description=$re->description;
      $data->quantity=$re->quantity;
      $data->image=$imageName;

      $data->save();

      return redirect()->back()->with('message','Product Added Successfully');

    }


    public function show_product()
    { 
      $data=Product::all();
      return view('admin.show_products',compact('data'));
    }

    public function delete_product($id)
    {
      $data=Product::find($id);
      $delete_product_name=$data->title;
      $data->delete();
      return redirect()->back()->with('message',$delete_product_name.' deleted successfully');
    }

    public function edit_product($id)
    {
      $data=Product::find($id);
      return view('admin.edit',compact('data'));
    }

    public function update_product(Request $re,$id)
    {
                 // validate data
        //  $re->validate([
        //         'title' => 'required',
        //         'price' => 'required',
        //         'quantity' => 'required',
        //         'description' => 'required',
        //         'product_image' => 'required|mimes:png,jpg,jpeg,gif|max:100000',
   
        //    ]);
           //$data=Product::where('id',$id)->first();

           $data=Product::where('id',$id)->first();
           $imageName=$data->image;


          //upload image file
          if($re->product_image)
          {
            $imageName=time().'.'.$re->product_image->extension();
            $re->product_image->move(public_path('product_image'),$imageName);
          }

          $title=$re->title;
          $quantity=$re->quantity;
          $price=$re->price;
          $description=$re->description;
          //$imageName=$re->product_image;
   
          Product::where('id','=',$id)->update([
           'title' => $title,
           'price' => $price,
           'description' => $description,
           'quantity' => $quantity,
           'image' => $imageName
          ]);
    
            return redirect()->back()->with('message','Product Updated Successfully');
            // return redirect()->back()->with('message','Image name: ' . $imageName);


    }

    public function show_orders()
    {  
      $order=Order::all();
       return view('admin.show_orders',compact('order'));
    }

    public function update_status($id)
    {  
      $order=Order::find($id);
      $order->status='Delivered';
      $order->save();
       return redirect()->back();

    }


}
