@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div class="mt-8">
                        <a href="{{ url('/events') }}" class="btn-blue">Events</a>
                        <a href="{{ url('/triggers') }}" class="btn-blue">Triggers</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
