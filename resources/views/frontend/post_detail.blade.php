@php 
use Carbon\Carbon;
@endphp
@extends('frontend.layouts.app')
@section('content')

<div class="py-4"></div>
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class=" col-lg-9   mb-5 mb-lg-0">
        <article>
          <div class="post-slider mb-4">
            <img src="{{ asset('public/images/'.$post->thumbnail) }}" class="card-img" alt="post-thumb">
          </div>
          
          <h1 class="h2">{{$post->title}}. </h1>
          <ul class="card-meta my-3 list-inline">
            <li class="list-inline-item">
            
                <span>{{$post->user->name}}</span>
              
            </li>
           
            <li class="list-inline-item">
              <i class="ti-calendar"></i>{{ Carbon::parse($post->created_at)->format('Y-m-d') }}
            </li>
            <li class="list-inline-item">
              <ul class="card-meta-tag list-inline">
              <li class="list-inline-item"><a href="tags.html">{{$post->show_category->name}}</a></li>
                  <li class="list-inline-item"><a href="tags.html">{{$post->show_tag->name}}</a></li>
              </ul>
            </li>
          </ul>
          <div class="content"><p>{{$post->description}}</p>
          </div>
        </article>
        
      </div>

      <div class="col-lg-9 col-md-12">
          <div class="mb-5 border-top mt-4 pt-5">
              <h3 class="mb-4">Comments</h3>
              @if(isset($comment))
              @foreach($comment as $com)
              <div class="media d-block d-sm-flex mb-4 pb-4">
                  <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                      <img src="images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                  </a>
                  <div class="media-body">
                      <a href="#!" class="h4 d-inline-block mb-3">{{$com->name}}</a>

                      <p>{{$com->comment}}</p>
                      
                      <span class="text-black-800 mr-3 font-weight-600">{{ $com->created_at->format('F j, Y \a\t g:i a') }}</span>
                      <a class="text-primary font-weight-600" href="#!">Reply</a>
                  </div>
              </div>
              @endforeach
@endif
             
          </div>

          <div>
              <h3 class="mb-4">Leave a comment</h3>
              <form method="POST" action="{{url('post_comment/'.$post->id)}}">
                @csrf
                  <div class="row">
                      <div class="form-group col-md-12">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                          <textarea class="form-control shadow-none" name="comment" rows="7" required></textarea>
                      </div>
                      <div class="form-group col-md-6">
                          <input class="form-control shadow-none" name="name" type="text" placeholder="Name" required>
                      </div>
                      <div class="form-group col-md-6">
                          <input class="form-control shadow-none" type="email" name="email" placeholder="Email" required>
                      </div>
                     
                  </div>
                  <button class="btn btn-primary" type="submit">Comment Now</button>
              </form>
          </div>
      </div>
      
    </div>
  </div>
</section>

@endsection