
@extends('backend.layouts.app')

@section('content')
    

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          @if(isset($post))
          <li class="breadcrumb-item active">Update Post</li>
          @else
          <li class="breadcrumb-item active">Add Post</li>
          @endif
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Post</h5>

              <!-- Horizontal Form -->
              @if(isset($post->id))
              <form action="{{url('update_post/'.$post->id)}}" enctype="multipart/form-data" method="post">
                @else
                <form action="{{url('store_post')}}" enctype="multipart/form-data" method="post">

                @endif
             
                @csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Post Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="@if(isset($post->id)) {{$post->title}} @endif" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <input type="text" name="category" value="@if(isset($post->id)) {{$post->category}} @endif" class="form-control" id="inputEmail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Tag</label>
                  <div class="col-sm-10">
                    <input type="text" name="tag" value="@if(isset($post->id)) {{$post->tag}} @endif" class="form-control" id="inputEmail">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea  name="description" class="form-control" >@if(isset($post->id)) {{$post->description}} @endif</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label">Thumbnail</label>
                  <div class="col-sm-10">
                    <input type="file" name="thumbnail" class="form-control" id="inputPassword">
                    @if(isset($post->id))
                    <img width="200px" height="100px" src="{{ asset('public/images/'.$post->thumbnail) }} " />
                    @endif
                  </div>
                </div>
                <fieldset class="row mb-3">
                  <legend class="col-form-label col-sm-2 pt-0">Tranding</legend>
                  <div class="col-sm-10">
                    <div class="form-check">

                      <input class="form-check-input" type="radio" name="tranding" id="gridRadios1" value="1" @if(isset($post->id) && $post->tranding==1 )   Checked  @endif >
                      <label class="form-check-label" for="gridRadios1">
                        Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="tranding" id="gridRadios2" value="0"  @if(isset($post->id) && $post->tranding==0 )   Checked  @endif>
                      <label class="form-check-label" for="gridRadios2">
                        No
                      </label>
                    </div>
                  </div>
                </fieldset>
                <div class="text-center">
                @if(isset($post->id))
                  <button type="submit" class="btn btn-primary">Update</button>
                  @else
                  <button type="submit" class="btn btn-primary">Submit</button>
                  
                  @endif
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


@endsection