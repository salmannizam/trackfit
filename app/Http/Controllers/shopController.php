<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\enquiry;

class shopController extends Controller
{
    // public function index(){
    //     $products = product::all()->where('status','1');
    //     return view('frontend.shop',compact('products'));
    // }
    public function index()
    {
        $products = Product::where('status', 1)->take(4)->get();
        return view('frontend.shop', compact('products'));
    }

    public function getMoreProducts($offset)
    {
        $moreProducts = Product::where('status', 1)->skip($offset)->take(4)->get();
        $view = view('frontend.product_partial', compact('moreProducts'))->render();
        return response()->json([
            'products' => $view,
            'count' => count($moreProducts),
        ]);
    }

    public function Single_Product($id){
        $Product = product::where('status','1')->FindOrFail($id);
        return view('frontend.View_Product',compact('Product'));
    }


}
