<?php

namespace App\Http\Controllers\Customer;

use App\Image;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('customer.home');
    }
    public function view(){

        $data['allData'] = Image::all();
        return view('backend.customer.view-customer',$data);
    }

    public function add(){
        return view('backend.customer.add-customer');
     }
     public function store(Request $request){
        $data = new Image();
        $image ="";
         if ($request->file('image')) {
                $file = $request->file('image');
                $fileName =date('YmdHi').$file->getClientOriginalName();
                $file->move('upload/customer_images/', $fileName);
                $image = $fileName;
            }
        $data->image = $image;
        $data->save();
        return redirect()->route('customer.view')->with('success','Data Inserted Successfully');

    }


    public function edit($id){
        $editData = Image::findOrfail($id);
       return view('backend.customer.edit-customer',compact('editData'));

}


public function update(Request $request, $id ){
    $data = Image::findOrfail($id);
    $image ="";
    if ($request->file('image')) {
            $file = $request->file('image');
             @unlink('upload/customer_images/'.$data->image);
            $fileName =date('YmdHi').$file->getClientOriginalExtension();
            $file->move('upload/customer_images/', $fileName);
            $image = $fileName;
        }
    $data->image = $image;
    $data->save();

    return redirect()->route('customer.view')->with('success','Data updated Successfully');

}

public function delete($id){

    $customer = Image::findOrfail($id);
    if(file_exists('upload/customer_images/' . $customer->image) AND ! empty($customer->image)){
        @unlink('upload/customer_images/' . $customer->image);
    }
    $customer->delete();
   return redirect()->route('customer.view')->with('success','Data Deleted Successfully');
}






}
