<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Ui\Presets\React;

class HomeController extends Controller
{
     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    public function view(){
        $data['allData'] = Admin::all();
        return view('backend.admin.view-admin',$data);
    }
    public function add(){
       return view('backend.admin.add-admin');
    }
    public function store(Request $request){

        $data = new Admin();
        $data->admintype = $request->admintype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password =bcrypt($request->password);
        $data->save();

        return redirect()->route('admin.view')->with('success','Data Inserted Successfully');

    }


     public function edit($id){
            $data = Admin::findOrfail($id);
           return view('backend.admin.edit-admin',compact('data'));

    }


    public function update(Request $request, $id ){
        $data = Admin::findOrfail($id);
        $data->admintype = $request->admintype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        return redirect()->route('admin.view')->with('success','Data updated Successfully');

    }

    public function delete($id){

        $data = Admin::findOrfail($id);
        if(file_exists('upload/user_images/' . $data->image) AND ! empty($data->image)){
            unlink('upload/user_images/' . $data->image);
        }
        $data->delete();
       return redirect()->route('admin.view')->with('success','Data Deleted Successfully');
    }





    
    public function customerView(){
        $data['allData'] = Image::all();
        return view('backend.admin.customer-view',$data);
    }


    public function customerDelete($id){

        $customer = Image::findOrfail($id);
        if(file_exists('upload/customer_images/' . $customer->image) AND ! empty($customer->image)){
            @unlink('upload/customer_images/' . $customer->image);
        }
        $customer->delete();
       return redirect()->route('customer.view')->with('success','Data Deleted Successfully');
    }


    public function deleteCheckAll(Request $request )
    {
        $ids = $request->ids;

        Image::where('id',$ids)->delete();
        return response()->json('success','Data Deleted Successfully');


    }
    






}
