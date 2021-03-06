@extends('layouts.app')
<!-- header -->
@include('includes.header')
<!-- header end -->
@section('content')
<div class="container">
      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">World</a>
          <a class="p-2 text-muted" href="#">U.S.</a>
          <a class="p-2 text-muted" href="#">Technology</a>
          <a class="p-2 text-muted" href="#">Design</a>
          <a class="p-2 text-muted" href="#">Culture</a>
          <a class="p-2 text-muted" href="#">Business</a>
          <a class="p-2 text-muted" href="#">Politics</a>
          <a class="p-2 text-muted" href="#">Opinion</a>
          <a class="p-2 text-muted" href="#">Science</a>
          <a class="p-2 text-muted" href="#">Health</a>
          <a class="p-2 text-muted" href="#">Style</a>
          <a class="p-2 text-muted" href="#">Travel</a>
        </nav>
      </div>

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
          <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what's most interesting in this post's contents.</p>
          <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
        </div>
      </div>
      @if(isset($data))
      <?php $count = 1; $i = 0; ?>
      @foreach($data as $row)
        @if($count == 1)
        <div class="row mb-2">
        @endif
        @if($count <= 2)
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">Author : {{ $data[$i]->name }}</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">{{ $data[$i]->title }}</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">{{ $data[$i]->excerpt }}</p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="@if($data[$i]->pic_thumbnail == null) {{ asset('/images/default/no-image.png')}} @else data:image/png;base64,{{base64_encode($data[$i]->pic_thumbnail)}} @endif" data-holder-rendered="true">
          </div>
        </div>
        <?php $count++; $i++; ?>
        @endif
        @if($count > 2)
        <?php $count = 1; ?>
        </div>
        @endif
        @endforeach
        @if($count == 2)
          <?php $count = 1; ?>
          </div>
        @endif
      @endif
    </div>
@endsection
