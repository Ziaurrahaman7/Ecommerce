<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
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
        $products = Product::all();
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
        // dd($request->all());
        $request['user_id']= Auth::id();
        $data = $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:products',
            'sku'=>'required',
            'category_id'=>'required',
            'user_id'=>'required',
            'price'=>'required',
            'discount'=>'nullable',
            'description'=>'nullable',
            'shiping_cost'=>'nullable',
            'shiping_address'=>'nullable',
            'feather_image'=>'required|max:3000|image',
            'related_img'=>'nullable|max:3000|image',
            'stock'=>'nullable',
            'visibility'=>'nullable',
            'is_promoted'=>'nullable',
            'promote_start_date'=>'nullable',
            'promote_end_date'=>'nullable',
        ]);
        // dd($data);
        $data['user_id']= Auth::id();
        $file = $request->file('feather_image');
        $name = $file->hashName();
        request()->file('feather_image')->store('public/uploads');
        $data['feather_image'] = $name;
        // ---------------
        $rfile = $request->file('related_img');
        $rname = $rfile->hashName();
        request()->file('related_img')->store('public/uploads');
        $data['related_img'] = $rname;
       
        Product::create($data);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
