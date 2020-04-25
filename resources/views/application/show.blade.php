@extends('layouts.admin_design')


@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $application ?? ''->image }}</h3>
       <p>{{ $application ?? ''->title }}</p>
       <p>{{ $application ?? ''->content }}</p>
      
    </div>
</div>
@endsection