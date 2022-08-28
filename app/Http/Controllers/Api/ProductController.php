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
}
