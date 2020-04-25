@extends('layouts.admin_design')

@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $about ?? ''->name }}</h3>
       <p>{{ $about ?? ''->email }}</p>
       <p>{{ $about ?? ''->message }}</p>
    </div>
</div>
@endsection