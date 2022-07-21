@extends('admin.master')
@section('content')
<x-form.form>
    <h3>Edit category</h3>
        <form method="post" action="/admin/category/{{$category->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <x-form.input name="title" :value="old('title',$category->title)"/>
            <div class="col-md-6  mt-3">
                <div class="form-group">
                 <label class="mt-3" for="role">Status</label>
                 <select name="status" class="form-select">
                   <option value="1" {{old(1, $category->status)==1 ? 'selected':''}}>Published</option>
                   <option value="0" {{old(0, $category->status)==0 ? 'selected':''}}>Un-published</option>
                </select>
                </div>
            </div>
        <div class="mt-4 mb-0">
           <x-form.button>Update</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection