@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Add Product</h3>
        <form method="post" class="text-start" action="/admin/product" enctype="multipart/form-data">
        @csrf
            <x-form.input onload="convertToSlug(this.value)" onchange="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" name="title"/>
            <x-form.input  id="inputslug" name="slug"/>
            <div class="input-group input-group-outline mt-3">
                <label for="">Feather Image</label>
            </div>
            <div class="input-group input-group-outline">
                <input type="file" class="form-control" multiple name="image[]">
            </div>
            {{-- <div class="input-group input-group-outline mt-3">
                <label for="">Related Image</label>
            </div>
            <div class="input-group input-group-outline">
                <input type="file" class="form-control" multiple  name="related_img[]">
            </div> --}}
            <x-form.input name="sku"/>
            <x-form.input type="number" name="price"/>
            <x-form.input type="number" name="discount"/>
            <x-form.input name="stock"/>
            <div class="input-group input-group-outline">
                <label>Select Category</label>
            </div>
            <div class="input-group input-group-outline">
                <select name="category_id"  class="form-select form-control">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
                <div class="input-group input-group-outline mt-3">
                <label>Shiping Address</label>
                </div>
                <div class="input-group input-group-outline">
                <textarea class="form-control" name="shiping_address" ></textarea>
                </div>
                <x-form.input type="number" name="shiping_cost"/>
                <div class="input-group input-group-outline">
                    <label>visibility</label>
                </div>
                <div class="input-group input-group-outline">
                    <select name="visibility"  class="form-select form-control">
                        <option value="1">On</option>
                        <option value="0">Off</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mt-3">
                    <label>Description</label>
                    </div>
                    <div class="input-group input-group-outline">
                        <textarea class="form-control" name="description" ></textarea>
                    </div>
                <div class="input-group input-group-outline">
                    <label>Is_promoted</label>
                </div>
                <div class="input-group input-group-outline">
                    <select name="Is_promoted"  class="form-select form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="input-group input-group-outline mt-3">
                    <label>Promote start date</label>
                </div>
                <div class="input-group input-group-outline">
                   <input type="date" class="form-control" name="promote_start_date" id="">
                </div>
                <div class="input-group input-group-outline mt-3">
                    <label for="">Promote end date</label>
                </div>
                <div class="input-group input-group-outline"> 
                    <input type="date" class="form-control" name="promote_end_date" id="">  
                </div>
        <div class="mt-4 mb-0">
           <x-form.button>Submit</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection