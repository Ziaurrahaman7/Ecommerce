@extends('admin.layouts.master')
@section('content')
<x-form.form>
    <h3>Edit product</h3>
        <form method="post" action="{{url('admin/product/'.$product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <x-form.input name="title" :value="old('title',$product->title)"/>
                <div class="form-group">
                 <label for="role">Select Parent product</label>
                 <select name="parent_id" class="form-select form-control">
                    <option value="">No Parent</option>
                    @foreach ($parentCat as $parent)
                        <option value="{{$parent->id}}" {{old($parent->id, $parent->id)==$product->parent_id ? 'selected':''}}>{{$parent->title}}</option>
                    @endforeach
                </select>
                <div class="input-group input-group-outline">
                    <select name="status"  class="form-select form-control">
                        <option value="1" {{old(1,$product->status)==$product->status ? 'selected':''}}>Publish</option>
                        <option value="0" {{old(0,$product->status)==$product->status ? 'selected':''}}>Unpublish</option>
                     </select>
                </div>
                </div>
        <div class="mt-4 mb-0">
           <x-form.button>Update</x-form.button>
        </div>
    </form>
</x-form.form>
@endsection