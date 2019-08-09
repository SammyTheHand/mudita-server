@extends ('layouts.app')

@section('content')
<div class="flex min-h-screen max-h-screen">
    <div class="flex flex-col mt-10 w-2/5">
        <h1 class="text-3xl font-light text-center">
            Edit Your Event
        </h1>
        <form 
            method="POST" 
            action="{{ $event->path() }}"
            class="mt-10 px-16"
        >
            @method('PATCH')
            @include('events.form', [
                'buttonText' => 'Update Event'
                ])
        </form>
        <a href="{{ $event->path() }}" class="px-16 mt-4 text-sm text-brand-green font-light underline">Back</a>
    </div>
    <div class="bg-brand-green w-3/5 max-h-full">
        <div class="block py-12 px-12">
            <img src="/assets/image/mudita-multi-fence.png">
        </div>
    </div>
</div>
@endsection