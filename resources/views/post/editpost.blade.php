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

        <form method="post" action="{{url('update/post/'.$post->id)}}" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title" required >
              
            </div>
          </div>
      		<br>
         	<div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="categoryid">
                @foreach($category as $cat)
              	<option value="{{$cat->id}}" <?php if($cat->id == $post->categoryid) echo"selected"?> name="categoryid">{{$cat->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
         	<br>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post New Image</label>
              <input type="file" class="form-control" placeholder="Post Image" name="image" >
              <p>Old Image:<img src="{{URL::to($post->image)}}" alt="image" style="height: 60px;width: 120px;"></p>
              <input type="hidden" name="oldimage" value="{{$post->image}}">
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Post Details" name="details"  >{{$post->details}}</textarea>
              
            </div>
          </div>

          <br>

          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Edit</button>
          </div>
        </form>
      </div>
    </div>
</div>

@endsection