@extends ('layouts.app')

@section('content')
<div class="flex min-h-screen max-h-screen">
    <div class="flex flex-col content-center w-2/5">
        <form 
            method="POST" 
            action="{{ $fence->path() }}"
            class="mt-10 px-16"
        >
            @method('PATCH')
            @include('fences.form', [
                'event' => $event,
                'buttonText' => 'Update Fence'
                ])
        </form> 
    </div>
       <div class="bg-brand-green w-3/5 max-h-full">
        <div class="flex flex-col justify-center">
            <h1 class="mt-10 text-3xl font-hairline text-center text-white">
                Edit Your Fence
            </h1>
            <div class="mx-auto block px-24">
                <img src="/assets/image/mudita-fence.png">
            </div>  
            <a href="{{ $event->path() }}" class="text-center text-white font-light underline">Back</a>
        </div>
    </div>
</div>
@endsection