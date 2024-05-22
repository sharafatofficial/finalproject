@php 
use Carbon\Carbon;
@endphp
@extends('frontend.layouts.app')
@section('content')

<section class="section-sm mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 mb-5 mb-lg-0">
  <h2 class="h5 section-title">@if(isset($cat_name)){{$cat_name}} @endif</h2>
  
 <div class="row">
    @if(isset($posts))
 @foreach($posts as $late)
  <div class="col-md-4">
        <article class="card">
          <div class="post-slider slider-sm">
            <img src="{{ asset('public/images/'.$late->thumbnail) }}" class="card-img-top" alt="post-thumb">
          </div>
          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="{{url('post_detail/'.$late->id)}}">{{$late->title}}</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                  <span>{{$late->user->name}}</span>
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>{{ Carbon::parse($late->created_at)->format('Y-m-d') }}
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">{{$late->show_category->name}}</a></li>
                  <li class="list-inline-item"><a href="tags.html">{{$late->show_tag->name}}</a></li>
                </ul>
              </li>
            </ul>
            <p>{{$late->descripton}}</p>
            <a href="{{url('post_detail/'.$late->id)}}" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
        </div>
        @endforeach
  @else

  <h2 class='text-danger'>NO Post found</h2>
  @endif
 </div>
 

</div>
      @include('frontend.layouts.sidebar')
    </div>
  </div>
</section>

@endsection
