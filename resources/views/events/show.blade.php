@extends ('layouts.app')

@section('content')

<header class="flex items-center mb-6 pb-4">
	<div class="flex justify-between items-end w-full">
		<p class="text-gray-500 font-normal text-sm">
			<a href="/events">Events</a> / {{ $event->title }}
		</p>
		<a href="{{ $event->path().'/edit' }}" class="btn-blue">Edit Event</a>
	</div>
</header>

<main>
	<div class="lg:flex items-start -mx-3">
		<div class="lg:w-3/4 px-3 mb-6">
			<div class="mb-8">
				<h2 class="text-lg text-grey font-normal mb-3">Fences</h2>

				{{-- fences --}}
				@foreach ($event->fences as $fence)
				<div class="card mb-3">
					<form method="POST" action="{{ $fence->path() }}">
						@method('PATCH')
						@csrf

						<input name="tag" value="{{ $fence->tag }}" class="w-full"> 
					</form>
				</div>
				@endforeach
				<div class="card mb-3">
					<form action="{{ $event->path() . '/fences' }}" method="POST">
						@csrf
						<input placeholder="Adding a new fence..." class="w-full" name="tag">
					</form>
				</div>
				<div>
					<h2 class="text-lg text-grey font-normal mb-3">General Notes</h2>
					{{-- general notes --}}
					<form method="POST" action="{{ $event->path() }}">
						@csrf
						@method('PATCH')

						<textarea 
							name='notes'
							class="card w-full mb-4" 
							style="min-height: 200px" 
							placeholder="Anything special that you want to make a note off?"
							>{{ $event->notes }}</textarea>

							<button type="submit" class="btn-blue">Save</button>
					</form>
					
				</div>
			</div>
		</div>
		<div class="lg:w-1/4 px-3 lg:py-10">
			@include ('events.card')
		</div>
	</div>
</main>

@endsection