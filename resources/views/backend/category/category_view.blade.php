
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

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($category as $mypost)
                  <tr>
                    <th scope="row">{{$mypost->id}}</th>
                    <td>{{$mypost->name}}</td>
                     </tr>
                  @endforeach
                
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>


@endsection