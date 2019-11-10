@extends('welcome')
@section('contants')
<div>
	<a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
  	<a href="{{route('all.posts')}}" class="btn btn-info">All Posts</a>
  	<a href="{{route('give.post')}}" class="btn btn-info">Add Post</a>
	<h1>View Category</h1>
	<div>
		<h3>{{$row->title}} </h3>
		<h6>{{$row->name}}</h6>
		<img src="{{URL::TO($row->image)}}">
		<br>
		<h6>Details:</h6><p>{{$row->details}} </p>
	</div>
</div>
@endsection