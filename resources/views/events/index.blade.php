@extends ('layouts.app')

@section('content')
<header class="flex items-center mb-3 py-4">
	<div class="flex justify-between items-end w-full">
		<h2 class="text-gray-500 font-normal text-sm">Events</h2>
		<a href="/events/create" class="btn-blue">New Event</a>
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
@endsection