@extends('welcome')
@section('contants')
<div>
  <a href="{{route('give.post')}}" class="btn btn-success">Add Posts</a>
  <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
  <a href="{{route('all.category')}}" class="btn btn-info">All Categories</a>
	<h2>All Posts</h2>
	<table class="table table-responsive">
    <tr>
      <th>SL</th>
      <th>Post Title</th>
      <th>Category</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
    @foreach($posts as $post)
    <tr>
      <td>{{$post->id}}</td>
      <td>{{$post->title}}</td>
      <td>{{$post->name}}</td>
      <td><img src="{{URL::to($post->image)}}" alt="{{$post->title}}" height="90" width="90"></td>      
      <td>
        <a href="{{URL::to('edit/post/'.$post->id)}}" class="btn btn-info btn-sm">Edit</a>
      </td>
      <td>
        <a href="{{URL::to('view/post/'.$post->id)}}" class="btn btn-success btn-sm">View</a>
      </td>
      <td>
        <a href="{{URL::to('delete/post/'.$post->id)}}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection