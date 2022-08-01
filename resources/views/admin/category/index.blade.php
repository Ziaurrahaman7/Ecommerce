@extends('admin.layouts.master')
@section('content')
<x-table link="/admin/category/create" name="Add category" title="Category">
    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Parent Name</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as  $category)
                    <tr>
                        <td class="text-center">{{ucwords($category->title)}}</td>
                        <td class="text-center">{{ucwords($category->status)}}</td>
                        <td class="text-center">@isset($category->parent->title)
                          {{ucwords($category->parent->title)}}  
                        @endisset</td>
                        <td class="text-center"> 
                            <div style="text-align:center">
                               <li style="display: inline-flex;
                               list-style: none;">
                                <form action="/admin/category/{{$category->id}}" method="post">
                                    <button class="btn btn-link text-danger text-gradient px-3 mb-0"><i class="material-icons text-sm me-2">delete</i> Delete</button>  
                                    @csrf
                                    @method('delete')
                                </form> 
                                <a class="btn btn-link text-dark px-3 mb-0"  href="/admin/category/{{$category->id}}/edit/" target="_blank"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                               </li>
                            </div> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              
</x-table>
@endsection