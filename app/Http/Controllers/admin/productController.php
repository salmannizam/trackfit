<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;

class productController extends Controller
{
    public function index(){
        $total_products = product::count();
        $active_products = product::where('status','1')->count();
        $products = product::orderBy('created_at', 'DESC')->paginate(2);
        return view('admin.product.index',compact(['products','active_products','total_products']));
    }

    public function add_product(Request $request){
        $categories = category::where('status','1')->get();
        
        return view('admin.product.add-product',compact('categories'));
    }

    public function create_product(Request $request){
        $product = $request->validate([
            'name'=>'required|min:3|max:50',
            'quantity'=>'required|min:1',
            'description'=>'required|min:1',
            'OriginalPrice'=>'required|min:1',
            'OfferPrice'=>'required|min:1',
            'image.*'=>'required|mimes:png,jpg,jpeg',
            'category_id'=>'required',
        ]);
        foreach ($request->image as $key => $value) {
            $image_name = time().'.'.$value->extension();
            $value->move(public_path('admin/product_image'),$image_name);
            $img_name[] = $image_name;
        }
        $image_names = json_encode($img_name);
        product::create([
            'name'=> $request->name,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'OriginalPrice'=>$request->OriginalPrice,
            'OfferPrice'=>$request->OfferPrice,
            'category_id'=>$request->category_id,
            'image'=>$image_names,
            'status'=>$request->status,
        ]);
        return redirect()->route('product');
    }

    

    public function edit_product($id){
        $product = product::FindOrFail($id);
        $categories = category::where('status','1')->get();
        return view('admin.product.edit-product',compact(['product','categories']));
    }
    
    public function update_product(Request $request,$id){
        $request->validate([
            'name'=>'required|min:3|max:50',
            'quantity'=>'required|min:1',
            'description'=>'required|min:1',
            'OriginalPrice'=>'required|min:1',
            'OfferPrice'=>'required|min:1',
            'category_id'=>'required',
            'image.*'=>'mimes:png,jpg,jpeg',
            'status'=>'required',
        ]);
        
        $product = product::FindOrFail($id);
        $existingImages = json_decode($product->image, true);
        if($request->hasFile('image')){
            foreach ($request->file('image') as $key => $value) {
                $image_name = time().'.'.$value->extension();
                $image_name = uniqid().time(). '.' . $value->extension();
                $value->move(public_path('admin/product_image'),$image_name);
                $existingImages[] = $image_name;
            }
        }
    
        $product->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'OriginalPrice' => $request->OriginalPrice,
            'OfferPrice' => $request->OfferPrice,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'image' => json_encode($existingImages),
        ]);
        return redirect()->route('product');
    }
    public function delete_product_image($id,$imageToDelete){
        $product = product::FindOrFail($id);
        $existingImages = json_decode($product->image, true);
       
        $keyToDelete = array_search($imageToDelete, $existingImages);
        if ($keyToDelete !== false) {
            unset($existingImages[$keyToDelete]);
            $imagePath = public_path('admin/product_image') . '/' . $imageToDelete;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
    
            $product->update([
                'image' => json_encode(array_values($existingImages)), // Re-index the array
            ]);
        }
        return redirect()->back();
         
    }


    public function delete_product($id){
        $product = product::FindOrFail($id);
        $existingImages = json_decode($product->image, true);
        if($existingImages){
            foreach($existingImages as $image){
                $imagePath = public_path('admin/product_image') . '/' . $image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        
        $product->delete();
        return redirect()->route('product');
        
    }
}
