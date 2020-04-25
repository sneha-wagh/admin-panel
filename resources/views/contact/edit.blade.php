@extends('layouts.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Contact</a> <a href="#" class="current">Edit Contact</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Contact</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ route('contact.update', $contact->id) }}">
              @method('PATCH')
              @csrf
             
              <div class="control-group">
                <label class="control-label">Name:</label>
                <div class="controls">
                  <input type="text" name="name" id="name" value="{{ $contact->name }}">
                </div>
              </div>


              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <textarea name="address">{{ $contact->address }}</textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Phone:</label>
                <div class="controls">
                  <input type="text" name="phone" id="phone" value="{{ $contact->phone }}">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Email:</label>
                <div class="controls">
                  <input type="text" name="email" id="email" value="{{ $contact->email }}">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Message</label>
                <div class="controls">
                  <textarea name="message">{{ $contact->message }}</textarea>
                </div>
              </div>

              
              
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div>
    <a style="margin: 19px;" href="{{ route('about.create')}}" class="btn btn-primary">New Data</a>
    </div> 
@endsection