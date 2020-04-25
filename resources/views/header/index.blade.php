@extends('layouts.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('header.create') }}">Header</a> <a href="{{ route('header.show') }}" class="current">View Header</a> </div>
    <h1>Header</h1>
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
            <h5>Header</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Updated_at</th>
                  <th>Created_at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($header as $header)
                <tr class="gradeX">
                  <td class="center">{{$header->id}}</td>
                  <td class="center">{{$header->mobile}}</td>
                  <td class="center">{{$header->email}}</td>
                  <td class="center">{{$header->address}}</td>
                  <td class="center"> 
                    <a href="{{ route('header.edit', $header->id) }}" class="btn btn-primary btn-mini">Edit<i class="fa fa-pencil" ></i>
                   </a>
                   </td>
                   <td>
                   <form action="{{ route('header.destroy', $header->id)}}" method="post">
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