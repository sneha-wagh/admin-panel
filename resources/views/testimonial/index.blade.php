@extends('layouts.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('testimonial.create') }}">Testimonial</a> <a href="#" class="current">View Testimonial</a> </div>
    <h1>Testimonial</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Testimonial</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>SN <sup>o</sup></th>
                  <th>Name</th>
                  <th>Photo</th>
                  <th>Designation</th>
                  <th>Content</th>
                  <th>Updated_at</th>
                  <th>Created_at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($testimonial as $key => $testimonial)
                <tr class="gradeX">
                  <th scope="row">{{ $key+1}}</th>
                  <td class="center">{{$testimonial->name}}</td>
                  <td class="center"><img src="{{ asset('img/testimonial/' .$testimonial->image) }}" alt="" style="width:70px; height:30px"></td>
                  <td class="center">{{$testimonial->designation}}</td>
                  <td class="center">{{$testimonial->content}}</td>
                  <td class="center">{{$testimonial->created_at}}</td>
                  <td class="center">{{$testimonial->updated_at}}</td>
               
                  <td class="center"> 
                    <a href="{{ route('testimonial.edit', $testimonial->id) }}" class="btn btn-primary btn-mini">Edit<i class="fa fa-pencil" ></i>
                   </a>
                 
                   <form action="{{ route('testimonial.destroy', $testimonial->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                     <button type="submit" class="btn btn-danger btn-mini deleteRecord">Delete</button>
                    </form> 
                   </td>
                </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection