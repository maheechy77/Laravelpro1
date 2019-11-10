@extends('welcome')
@section('contants')
<div class='container'>
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<a href="{{route('all.students')}}" class="btn btn-info">All Students</a>
        <br>
        <hr>
        <h2>Edit Student Information.</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form method="post" action="{{URL::to('update/student/'.$stud->id)}}" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{$stud->name}}" name="name" required >
              
            </div>
          </div>
      		<br>
      		<div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="email" class="form-control" value="{{$stud->email}}" name="email" required >   
            </div>
          	</div>
         	<br>
          	<br>
      		<div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="text" class="form-control" value="{{$stud->phone}}" name="phone" required > 
            </div>
          	</div>
         	<br>

          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection