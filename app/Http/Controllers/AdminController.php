<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function uploadproduct(Request $request)
    {
        $data = new Product;
        
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->save();

        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function showproduct()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data = Product::all();

                return view('admin.showproduct',compact('data'));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function update($id)
    {
        $data = Product::find($id);
        
        return view('admin.update',compact('data'));
    }

    public function edit(Request $request,$id)
    {
        $data = Product::find($id);

        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('productimage',$imagename);
            $data->image = $imagename;
        }
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->quantity = $request->quantity;
        $data->save();

        return redirect()->back()->with('message','Product Updated Successfully');
    }

    public function delete($id)
    {
        $data = Product::find($id);
        $data->delete();

        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function showorder()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype==1)
            {
                $data = Order::all();

                return view('admin.showorder',compact('data'));
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function deliver($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();

        return redirect()->back()->with('message','Delivered Successfully');
    }
}
