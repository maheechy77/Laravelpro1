@extends('welcome')
@section('contants')
<div>
	<a href="{{route('add.student')}}" class="btn btn-success">Add Student</a>
  	<a href="{{route('all.students')}}" class="btn btn-info">All Students</a>
	<h2>View Category</h2>
	<div>
		<ul>
			<li>Id:{{$student->id}} </li>
			<li>Name:{{$student->name}} </li>
			<li>Email:{{$student->email}} </li>
			<li>Phone:{{$student->phone}} </li>
		</ul>
	</div>
</div>
@endsection