@extends('layouts.admin_design')


@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $blog ?? ''->image }}</h3>
       <p>{{ $blog ?? ''->heading }}</p>
       <p>{{ $blog ?? ''->title }}</p>
       <p>{{ $blog ?? ''->content }}</p>
      
    </div>
</div>
@endsection