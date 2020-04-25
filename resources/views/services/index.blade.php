@extends('layouts.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('services.create') }}">Services</a> <a href="#" class="current">View Services</a> </div>
    <h1>Services</h1>
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
            <h5>Services</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>SN <sup>o</sup></th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Updated_at</th>
                  <th>Created_at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($services as $key => $services)
                <tr class="gradeX">
                  <th scope="row">{{ $key+1}}</th>
                  <td class="center"><img src="{{ asset('img/services/' .$services->image) }}" alt="" style="width:70px; height:30px"></td>
                  <td class="center">{{$services->title}}</td>
                  <td class="center">{{$services->description}}</td>
                  <td class="center">{{$services->created_at}}</td>
                  <td class="center">{{$services->updated_at}}</td>
               
                  <td class="center"> 
                    <a href="{{ route('services.edit', $services->id) }}" class="btn btn-primary btn-mini">Edit<i class="fa fa-pencil" ></i>
                   </a>
                 
                   <form action="{{ route('services.destroy', $services->id)}}" method="post">
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