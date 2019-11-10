@extends('welcome')
@section('contants')
<div>
	<h2>Index Page</h2>
	<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($posts as $post)
        <div class="post-preview">
          <a href="post.html">
            <h2 class="post-title">
              {{ $post->title}}
            </h2>
            <h3 class="post-image">
              <img src="{{ URL::to($post->image)}}" />
            </h3>
          </a>
          <p class="post-category"><h6>Category: 
            {{$post->name}}</h6>
            Slug {{$post->slug}}</p>
        </div>
        <hr>
        @endforeach

        {{$posts->links()}}
        
      </div>
    </div>
</div>
@endsection