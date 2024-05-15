
@extends('backend.layouts.app')

@section('content')
    

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          @if(isset($cat))
          <li class="breadcrumb-item active">Update category</li>
          @else
          <li class="breadcrumb-item active">Add category</li>
          @endif
        
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="card">
            <div class="card-body">
              <h5 class="card-title">category</h5>

              <!-- Horizontal Form -->
              @if(isset($cat->id))
              <form action="{{url('update_cat/'.$cat->id)}}" enctype="multipart/form-data" method="post">
                @else
                <form action="{{url('store_cat')}}" enctype="multipart/form-data" method="post">

                @endif
             
                @csrf
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" value=" @if(isset($cat->id)) {{$cat->name}} @endif" class="form-control" id="inputText">
                  </div>
                </div>
               
                <div class="text-center">
                @if(isset($cat->id))
                  <button type="submit" class="btn btn-primary">Update</button>
                  @else
                  <button type="submit" class="btn btn-primary">Submit</button>
                  
                  @endif
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>


@endsection