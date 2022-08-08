@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Edit product</h3>
        <form method="post" action="{{url('admin/product/'.$product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <x-form.input name="title" :value="old('title',$product->title)"/>
            <x-form.input name="slug" :value="old('slug',$product->slug)"/>
                @foreach ($product->productImage as $file) 
                <img src="{{url('/storage/uploads')}}/{{$file->image}}" style="width:50px;height:50px;"> 
              @endforeach</td>
                <x-form.input multiple  name="image[]" type="file" :value="old('image',$product->image)"/>
                <x-form.input name="sku" :value="old('sku',$product->sku)"/>
                <x-form.input type="number" name="price" :value="old('price',$product->price)"/>
                <x-form.input type="number" name="discount" :value="old('discount',$product->discount)"/>
                <x-form.input name="stock" :value="old('stock',$product->stock)"/>
                <div class="input-group input-group-outline">
                    <label>Select Category</label>
                </div>
                <div class="input-group input-group-outline">
                    <select name="category_id"  class="form-select form-control">
                        <option value="1">cat 1</option>
                        <option value="1">cat 2</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mt-3">
                    <label>Shiping Address</label>
                </div>
                <div class="input-group input-group-outline">
                    <textarea class="form-control" name="shiping_address" >{{$product->shiping_address}}</textarea>
                </div>
                <x-form.input type="number" name="shiping_cost" :value="old('shiping_cost',$product->shiping_cost)"/>
                <div class="input-group input-group-outline">
                    <label>visibility</label>
                </div>
                <div class="input-group input-group-outline">
                    <select name="visibility"  class="form-select form-control">
                        <option value="1" {{old('visibility', 1)==$product->visibility ? 'selected':''}}>On</option>
                        <option value="0" {{old('visibility', 0)==$product->visibility ? 'selected':''}}>Off</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mt-3">
                    <label>Description</label>
                </div>
                <div class="input-group input-group-outline">
                    <textarea class="form-control" name="description" >{{$product->description}}</textarea>
                </div>
                <div class="input-group input-group-outline">
                    <label>Is_promoted</label>
                </div>
                <div class="input-group input-group-outline">
                    <select name="Is_promoted"  class="form-select form-control">
                        <option value="1" {{old('visibility', 1)==$product->Is_promoted ? 'selected':''}}>Yes</option>
                        <option value="0" {{old('visibility', 0)==$product->Is_promoted ? 'selected':''}}>No</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mt-3">
                    <label>Promote start date</label>
                </div>
                <div class="input-group input-group-outline">
                   <input type="date" class="form-control" name="promote_start_date"  :value="old('promote_start_date',$product->promote_start_date)">
                </div>
                <div class="input-group input-group-outline mt-3">
                    <label for="">Promote end date</label>
                </div>
                <div class="input-group input-group-outline"> 
                    <input type="date" class="form-control" name="promote_end_date"   :value="old('promote_start_date',$product->promote_end_date)">  
                </div>
        <div class="mt-4 mb-0">
           <x-form.button>Update</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection