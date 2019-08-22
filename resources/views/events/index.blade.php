@extends ('layouts.app')

@section('content')
<div class="p-8">
	<header class="flex items-center mb-6 pb-4">
		<div class="flex justify-between w-full">
			<p class="text-gray-500 font-normal text-sm">
				<a href="/events">Events</a>
			</p>
			<a href="/events/create" class="bg-brand-green text-white text-base px-4 py-2 rounded shadow hover:bg-teal-700 focus:outline-none focus:shadow-outlin">Create a new event</a>
		</div>
	</header>
	<main class="lg:flex lg:flex-wrap -mx-3">
		@forelse ($events as $event)
		<div class="lg:w-1/3 px-3 pb-6">
		 	@include ('events.card')
		</div>
		@empty	
		<div>No events yet.</div>
		@endforelse	
	</main>
</div>
@endsection