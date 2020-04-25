@extends('layouts.admin_design')

@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $contact ?? ''->name }}</h3>
       <p>{{ $contact ?? ''->address }}</p>
       <p>{{ $contact ?? ''->phone }}</p>
       <p>{{ $contact ?? ''->email }}</p>
       <p>{{ $contact ?? ''->message }}</p>
    </div>
</div>
@endsection