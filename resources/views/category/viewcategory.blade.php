@extends('welcome')
@section('contants')
<div>
	<a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
  	<a href="{{route('all.category')}}" class="btn btn-info">All Categories</a>
	<h2>View Category</h2>
	<div>
		<ul>
			<li>Id:{{$cat->id}} </li>
			<li>Name:{{$cat->name}} </li>
			<li>Slug:{{$cat->slug}} </li>
		</ul>
	</div>
</div>
@endsection