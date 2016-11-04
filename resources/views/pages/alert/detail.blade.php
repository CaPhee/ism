@extends('layouts.app')
@section('title', 'Content')
@section('css')
	<link rel="stylesheet" href="{{ URL::asset('public/css/alert.css') }}">	
@endsection
@section('content')
	<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="carousel-item active" style="text-align: center;">
            <img class="banner img-fluid" src="https://images.alphacoders.com/102/102211.jpg" alt="First slide">
      </div>
    </div>
  </div>
  <div class="dropdown-divider"></div>
  <div class="row">
    <div class="col-md-12">
      <h2>{!! $content['title'] !!}</h2>
      <div class="row">
        <div class="media">
          <a class="media-left media-middle" href="#">
            <img class="img-media media-object" src="http://s3.amazonaws.com/libapps/accounts/10097/images/blog.png" alt="Photo of Pukeko in New Zealand">
          </a>
          <div class="media-body">
            <h4 class="media-heading">{!! $content['type'] !!}</h4>
            <p>{!! $content['content'] !!}</p>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="#"><i class="fa fa-user"></i>{!! $manager['name'] !!}</a></li>
            </ul>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-3">
      
    </div>
  </div>
</div>

@endsection
@section('js')
    <script src="{{ URL::asset('public/js/alert.js') }}"></script>
@endsection