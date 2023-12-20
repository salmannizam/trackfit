<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;

class EnquiryController extends Controller
{

    public function index(){
        $total_enquiry = enquiry::count();
        $today_enquiry = enquiry::where('created_at','>=',date('Y-m-d 00:00:01'))->count();
        $enquiries = enquiry::orderBy('created_at', 'DESC')->paginate(2);
        return view('admin.index',compact(['enquiries','today_enquiry','total_enquiry']));
        
    }
    public function addEnquiry(Request $request,$id){
        
        $request->validate([
           'name'=>'required|min:3|max:40',
           'email'=>'email',
           'phone'=>'required|min:10|max:12',
       ]);
       if(isset($id)){
        enquiry::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'comment'=>$request->comment,
            'product_id'=>$id,
        ]);
       }
       
       
       return redirect()->route('shop');
   }
}
