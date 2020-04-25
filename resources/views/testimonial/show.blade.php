@extends('layouts.admin_design')


@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $testimonial ?? ''->title }}</h3>
       <p>{{ $testimonial ?? ''->image }}</p>
       <p>{{ $testimonial ?? ''->designation }}</p>
       <p>{{ $testimonial ?? ''->content }}</p>
      
    </div>
</div>
@endsection