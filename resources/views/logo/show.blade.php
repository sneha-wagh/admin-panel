@extends('layouts.admin_design')


@section('content')
<div class="card">
    <div class="card-body">
       <h3>{{ $logo ?? ''->image }}</h3>
       <p>{{ $logo ?? ''->caption }}</p>
       <!-- <p>{{ $clientlogo ?? ''->content }}</p> -->
      
    </div>
</div>
@endsection