@extends('layouts.admin_design')


@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $clientlogo ?? ''->title }}</h3>
       <p>{{ $clientlogo ?? ''->image }}</p>
       <p>{{ $clientlogo ?? ''->content }}</p>
      
    </div>
</div>
@endsection