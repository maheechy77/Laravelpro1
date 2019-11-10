@extends('welcome')
@section('contants')
<div>
  <a href="{{route('add.student')}}" class="btn btn-info">Add Students</a>
	<h2>All Category</h2>
	<table class="table table-responsive">
    <tr>
      <th>SL</th>
      <th>Student Name</th>
      <th>Student Email</th>
      <th>Student Phone</th>
      <th>Action</th>
    </tr>
    @foreach($students as $student)
    <tr>
      <td>{{$student->id}}</td>
      <td>{{$student->name}}</td>
      <td>{{$student->email}}</td>
      <td>{{$student->phone}}</td>
      <td>
        <a href="{{URL::to('edit/student/'.$student->id)}}" class="btn btn-info btn-sm">Edit</a>
      </td>
      <td>  
        <a href="{{URL::to('view/student/'.$student->id)}}" class="btn btn-success btn-sm">View</a>
      </td>
      <td>  
        <a href="{{URL::to('delete/student/'.$student->id)}}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection