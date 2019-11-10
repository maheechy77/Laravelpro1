@extends('welcome')
@section('contants')
<div class='container'>
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<a href="{{route('all.students')}}" class="btn btn-info">All Students</a>
        <br>
        <hr>
        <h2>Create New Student Information.</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form method="post" action="{{route('store.students')}}" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" placeholder="Student Name" name="name" required >
              
            </div>
          </div>
      		<br>
      		<div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="email" class="form-control" placeholder="Student Email" name="email" required >   
            </div>
          	</div>
         	<br>
          	<br>
      		<div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="text" class="form-control" placeholder="Student Phone" name="phone" required > 
            </div>
          	</div>
         	<br>

          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection