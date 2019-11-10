@extends('welcome')
@section('contants')
<div>
	<a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
  	<a href="{{route('all.category')}}" class="btn btn-info">All Categories</a>
    <hr>
    <br>
	<h2>Update Category</h2>
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
	 <form action="{{URL::to('storeupdate/category/'.$cat->id)}}" method="post">
	 	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name" value="{{$cat->name}}" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug" value="{{$cat->slug}}" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Approved/Unapproved</label>
              <select class="form-control" name='status' id='status'>
              	<option name='status' value="1">Approved</option>
              	<option name='status' value="0">Unapproved</option>
              </select>
            </div>
          </div>
      	  <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" >Send</button>
          </div>
        </form>
</div>
@endsection