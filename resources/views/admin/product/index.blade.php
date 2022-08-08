@extends('admin.layouts.master')
@section('content')
<x-table link="/admin/product/create" name="Add product" title="product">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">feather_image</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Visibility</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Promoted</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    
                    @foreach ($products as  $product)
                    <tr>
                      
                        <td class="text-center">{{Ucwords($product->title)}}</td>
                        <td class="text-center">{{$product->price}}</td>
                        <td class="text-center">{{$product->category_id}}</td>
                        <td class="text-center">
                         @foreach ($product->productImage as $file) 
                           <img src="{{url('/storage/uploads')}}/{{$file->image}}" style="width:50px;height:50px;"> 
                         @endforeach</td>
                        <td class="text-center">{{$product->quantity}}</td>
                        <td class="text-center">{{$product->discount}}</td>
                        <td class="text-center">{{$product->Visibility}}</td>
                        <td class="text-center">{{$product->Promoted}}</td>
                        <td class="text-center"> 
                            <div style="text-align:center">
                               <li style="display: inline-flex;
                               list-style: none;">
                                <form action="/admin/product/{{$product->id}}" method="post">
                                    <button class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="material-icons text-sm me-2">delete</i> Delete</button>  
                                    @csrf
                                    @method('delete')
                                </form> 
                                <a class="btn btn-link text-dark px-3 mb-0"  href="/admin/product/{{$product->id}}/edit/" target="_blank"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                               </li>
                            </div> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              
</x-table>
@endsection