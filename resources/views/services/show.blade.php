@extends('layouts.admin_design')


@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $services ?? ''->image }}</h3>
       <p>{{ $services ?? ''->title }}</p>
       <p>{{ $services ?? ''->description }}</p>
      
    </div>
</div>
@endsection