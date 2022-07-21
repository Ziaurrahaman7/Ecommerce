@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Create category</h3>
        <form method="post" class="text-start" action="/admin/category" enctype="multipart/form-data">
        @csrf
            <x-form.input name="title"/>
            <div class="input-group input-group-outline">
                <label>Select Parent Category</label>
            </div>
            <div class="input-group input-group-outline">
                <select name="parent_id"  class="form-select form-control">
                    <option value="">Select Parent</option>
                    @foreach ($categories as $category )
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                 </select>
            </div>
            <div class="input-group input-group-outline">
                <label>Status</label>
            </div>
            <div class="input-group input-group-outline">
                <select name="status"  class="form-select form-control">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                 </select>
            </div>
        <div class="mt-4 mb-0">
           <x-form.button>Submit</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection