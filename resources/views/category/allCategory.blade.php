@extends('welcome')
@section('contants')
<div>
  <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
  <a href="{{route('all.category')}}" class="btn btn-info">All Categories</a>
	<h2>All Category</h2>
	<table class="table table-responsive">
    <tr>
      <th>SL</th>
      <th>Category Name</th>
      <th>Slug</th>
      <th>Action</th>
    </tr>
    @foreach($category as $cat)
    <tr>
      <td>{{$cat->id}}</td>
      <td>{{$cat->name}}</td>
      <td>{{$cat->slug}}</td>
      <td>
        <a href="{{URL::to('edit/category/'.$cat->id)}}" class="btn btn-info btn-sm">Edit</a>
      </td>
      <td>  
        <a href="{{URL::to('view/category/'.$cat->id)}}" class="btn btn-success btn-sm">View</a>
      </td>
      <td>  
        <a href="{{URL::to('delete/category/'.$cat->id)}}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection