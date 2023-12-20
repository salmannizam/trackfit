<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class categoryController extends Controller
{
    public function index(){
        $total_categories = category::count();
        $active_categories = category::where('status','1')->count();
        $categories = category::orderBy('created_at', 'DESC')->paginate(2);
        return view('admin.category.index',compact(['categories','active_categories','total_categories']));
    }

    public function add_category(){
        return view('admin.category.add-category');
    }
    
    public function create_category(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:40',
            'slug'=> 'required|min:3|max:40',
            'description'=>'required|min:3|max:40',
            'status'=>'required',
        ]);

        category::create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'description'=>$request->description,
            'status'=>$request->status,
            
        ]);
        return redirect()->route('category');
    }

    public function edit_category($id){
        $category = category::FindOrFail($id);
        return view('admin.category.edit-category',compact('category'));
    }

    public function update_category(Request $request,$id){
        $request->validate([
            'name'=>'required|min:3|max:40',
            'slug'=> 'required|min:3|max:40',
            'description'=>'required|min:3|max:40',
            'status'=>'required',
        ]);

        $category = category::FindOrFail($id);
        $category->name= $request->name;
        $category->slug= $request->slug;
        $category->description= $request->description;
        $category->status= $request->status;
        $category->save();
        return redirect()->route('category');
    }

    public function delete_category($id){
        $category = category::FindOrFail($id);
        $category->delete();
        return redirect()->route('category');
    }

}
