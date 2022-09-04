<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('productImage')->get();  
        try{
            $resposData = response()->json([
                'status'=>200,
                'message'=>'Data fetch succesfully',
                'imageurl'=>'http://127.0.0.1:8000/storage/uploads/',
                'data'=>$products
            ]);
            return $resposData;
        }catch(\Exception $ex){
            response()->json([
            'status'=>500,
            'messgae'=> $ex->getMessage(),
            'data'=>null
            ]);
            
        }
    }

    public function category(){
        $categories = Category::all();
        try {
            $resposData = response()->json([
                'status'=>200,
                'message'=>'Data fetch succesfully',
                'data'=>$categories
            ]);
            return $resposData;
        } catch (\Exception $ex) {
            response()->json([
                'status'=>500,
                'messgae'=> $ex->getMessage(),
                'data'=>null
                ]);
        }
    }
    public function product($id){
        $single_prodduct = Product::where('id', $id)->with('productImage')->first();
        try{
            $resposData= response()->json([
                'status'=>200,
                'message'=>'Single product data succefully show',
                'imageurl'=>'http://127.0.0.1:8000/storage/uploads/',
                'data'=>$single_prodduct
            ]);
            return $resposData;
        }catch(\Exception $ex){
           response()->json([
            'status'=> 500,
            'messgase'=>$ex->getMessage(),
            'data'=> null,
           ]);
        }
    }

    public function relatetdProduct($id){
        $single_prodduct = Product::where('id', $id)->with('productImage','category')->first();
        $catId = $single_prodduct->category ? $single_prodduct->category->id : "";
        $relp = Product::take(4)->where('category_id', $catId)->where('id','!=',$id)->with('category','productImage')->get()->sortDesc();
        try {
           $resposData = response()->json([
            'status'=>200,
            'message'=>'related product succesfully fetch',
            'data'=>$relp
           ]);
           return $resposData;
        } catch (\Exception $ex) {
            $resposData = response()->json([
                'status'=>400,
                'message'=>$ex->getMessage(),
                'data'=>null
               ]);
        }
    }
}
