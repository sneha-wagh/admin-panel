@extends('layouts.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Blog</a> <a href="#" class="current">Add Blog</a> </div>
    <h1>Blog</h1>
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
            <h5>Add Blog</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ route('blog.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="control-group">
                <label class="control-label">Blog Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Blog Heading</label>
                <div class="controls">
                  <input type="text" name="heading" id="heading">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Blog Title</label>
                <div class="controls">
                  <input type="text" name="title" id="title">
                </div>
              </div>
             
              
              <div class="control-group">
                <label class="control-label">Blog Content</label>
                <div class="controls">
                 <textarea name="content" id="content"></textarea>
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