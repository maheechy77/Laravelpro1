@extends('welcome')
@section('contants')
<div class='container'>
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <a href="{{route('all.posts')}}" class="btn btn-info">All Posts</a>
        <a href="{{route('add.category')}}" class="btn btn-success">Add Category</a>
        <a href="{{route('all.category')}}" class="btn btn-success">All Categories</a>
        <br>
        <hr>
        <h2>Post</h2>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        <form method="post" action="{{route('store.posts')}}" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Post Title" name="title" required >
              
            </div>
          </div>
      		<br>
         	<div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="categoryid">
                @foreach($category as $cat)
              	<option value="{{$cat->id}}" name="categoryid">{{$cat->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
         	<br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" placeholder="Post Image" name="image" required >
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Post Details" name="details"  required ></textarea>
              
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