@extends('layouts.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Header</a> <a href="#" class="current">Add Header</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Header</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ route('header.store') }}">
              @csrf
              <div class="control-group">
                <label class="control-label">Add Mobile</label>
                <div class="controls">
                  <input type="text" name="mobile" id="mobile">
                </div>
              </div>

               <div class="control-group">
                <label class="control-label">Add Email</label>
                <div class="controls">
                  <input type="text" name="email" id="email">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Add Address</label>
                <div class="controls">
                  <textarea name="address" id="address"></textarea>
                </div>
              </div>
              
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection