
@extends('backend.layouts.app')

@section('content')
     




    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add Post</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Description</th>
                    <th scope="col">comments</th>
                    <th scope="col">image</th>
                    <th scope="col">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $mypost)
                  <tr>
                    <th scope="row">{{$mypost->id}}</th>
                    <td>{{$mypost->title}}</td>
                    <td>{{$mypost->show_category->name}}</td>
                    <td>{{$mypost->show_tag->name}}</td>
                    <td>{{$mypost->description}}</td>
                    <td>{{$mypost->comments}}</td>
                    <td> <img width="200px" height="100px" src="{{ asset('public/images/'.$mypost->thumbnail) }}" /> </td>
                    <td>
                        <a href="{{url('post_update')}}/{{$mypost->id}}" class="btn btn-info">Edit</a>
                        <a href="{{url('post_delete')}}/{{$mypost->id}}" class="btn btn-danger">Delete</a>
                      </td>
                  </tr>
                  @endforeach
                
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


@endsection