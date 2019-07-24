@extends ('layouts.app')

@section('content')
    <div class="lg:w-1/2 lg:mx-auto bg-white p-6 md:py-12 md:px-16 rounded shadow">
        <h1 class="htext 2xl font normal mb-10 text-center">
            Create Your Fence
        </h1>
        <form 
            method="POST" 
            action="{{ $event->path() . '/fences' }}"
        >
            @include('fences.form', [
                'event' => $event,
                'fence' => new App\Fence,
                'buttonText' => 'Create Fence'
            ])
        </form> 
    </div>
@endsection