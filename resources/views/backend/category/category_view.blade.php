
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
              <h5 class="card-title">Category</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($category as $mypost)
                  <tr>
                    <th scope="row">{{$mypost->id}}</th>
                    <td>{{$mypost->name}}</td>
                    <td>
                        <a href="{{url('cat_update')}}/{{$mypost->id}}" class="btn btn-info">Edit</a>
                        <a href="{{url('cat_delete')}}/{{$mypost->id}}" class="btn btn-danger">Delete</a>
                      </td>
                     </tr>
                  @endforeach
                
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


@endsection