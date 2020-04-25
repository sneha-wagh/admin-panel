@extends('layouts.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{ route('contact.create') }}">Contact</a> <a href="#" class="current">View Contact</a> </div>
    <h1>Contact</h1>
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
            <h5>Contact</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Updated_at</th>
                  <th>Created_at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contact as $contact)
                <tr class="gradeX">
                  
                  <td class="center">{{$contact->id}}</td>
                  <td class="center">{{$contact->name}}</td>
                  <td class="center">{{$contact->address}}</td>
                  <td class="center">{{$contact->phone}}</td>
                  <td class="center">{{$contact->email}}</td>
                  <td class="center">{{$contact->message}}</td>
                  <td class="center">{{$contact->created_at}}</td>
                  <td class="center">{{$contact->updated_at}}</td>
               
                  <td class="center"> 
                    <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-primary btn-mini">Edit<i class="fa fa-pencil" ></i>
                   </a>
                 
                   <form action="{{ route('contact.destroy', $contact->id)}}" method="post">
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