@extends('layouts.admin_design')

@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Logo</a> <a href="#" class="current">Edit Logo</a> </div>
    <h1>Logo</h1>
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
            <h5>Add Logo</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{ route('logo.update', $logo->id) }}" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
             
               <div class="control-group">
                <label class="control-label">Logo Image:</label>
                <div class="controls">
                  <input type="hidden"  name="image" value="{{$logo->image}}">
                  <input type="file" name="image" id="image" value="{{ $logo->image }}">
                   <p><img src="{{asset('img/logo/' . $logo->image) }}" width="80px" height="50" alt=""></p>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Logo Caption:</label>
                <div class="controls">
                  <input type="text" name="caption" id="caption" value="{{ $logo->caption }}">
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
    <a style="margin: 19px;" href="{{ route('clientlogo.create')}}" class="btn btn-primary">New Data</a>
    </div> 
@endsection