@extends ('layouts.app')

@section('content')
<div class="flex min-h-screen max-h-screen">
    <div class="flex flex-col content-center w-2/5">
        <p class="text-gray-500 font-normal text-sm mt-8 px-8">
            <a href="/events">Events</a> / <a href="{{ $event->path() }}">{{ $event->title }}</a> / Fence
        </p>
        <form 
            method="POST" 
            action="{{ $event->path() . '/fences' }}"
            class="mt-4 px-8"
        >
            @include('fences.form', [
                'event' => $event,
                'fence' => new App\Fence,
                'buttonText' => 'Create Fence'
            ])
        </form> 
    </div>
    <div class="bg-brand-green w-3/5 max-h-full flex items-center">
        <div>
            <h1 class="text-3xl font-hairline text-center text-white mb-6">
                Create Your Fence
            </h1>
            <div class="mx-auto block px-24">
                <img src="/assets/image/mudita-fence.png">
            </div>  
        </div>
    </div>
</div>
@endsection