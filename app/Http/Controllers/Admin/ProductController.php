<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('productImage')->get();
        // dd(($products->toArray()));
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = Auth::id();
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:products',
            'sku' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'description' => 'nullable',
            'shiping_cost' => 'nullable',
            'shiping_address' => 'nullable',
            'stock' => 'nullable',
            'visibility' => 'nullable',
            'is_promoted' => 'nullable',
            'promote_start_date' => 'nullable',
            'promote_end_date' => 'nullable',
        ]);
        $data['user_id'] = Auth::id();
        $ft = Product::create($data);
        foreach ($request->file('image') as $key => $file) {
            $path = $file->store('public/uploads');
            $name = $file->hashName();
            $datas[] = ['image' => $name];
        }
        $ft->ProductImage()->createMany($datas);
        return redirect('admin/product')->with('success', 'successfully inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $parentCat = Category::all();
        return view('admin.product.edit', compact('product', 'parentCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request['user_id'] = Auth::id();
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'sku' => 'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'description' => 'nullable',
            'shiping_cost' => 'nullable',
            'feather_image' => 'image|max:3000',
            'shiping_address' => 'nullable',
            'stock' => 'nullable',
            'visibility' => 'nullable',
            'is_promoted' => 'nullable',
            'promote_start_date' => 'nullable',
            'promote_end_date' => 'nullable',
        ]);
        $data['user_id'] = Auth::id();
        $ft = $product->update($data);
        // $datas['image']= $request->file('image');
        if ($request->file('image')) {
            // dd($request->file('image'));
            // $key[]="";
            foreach ($request->file('image') as $key => $file) {

                $path = $file->store('public/uploads');
                $name = $file->hashName();
                $datas[] = ['image' => $name];
            }
            $product->ProductImage()->delete();
            $product->ProductImage()->createMany($datas);
        }

        return redirect('admin/product')->with('success', 'successfully inserted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
