@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="card mt-4" role="alert">
        <h4 class="text-brand-green text-lg">{{ session('status') }}</h4>
    </div>
@endif


<div class="mt-8">
    <a href="{{ url('/events') }}" class="btn-blue">Events</a>
    <a href="{{ url('/triggers') }}" class="btn-blue">Triggers</a>
</div> 
@endsection
