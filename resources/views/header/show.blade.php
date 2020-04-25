@extends('layouts.admin_design')


@section('content')
<div class="card">
    <div class="card-body">
       <p>{{ $header ?? ''->mobile }}</p>
       <p>{{ $header ?? ''->email }}</p>
       <p>{{ $header ?? ''->address }}</p>
    </div>
</div>
@endsection