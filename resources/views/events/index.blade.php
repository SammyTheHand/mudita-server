@extends ('layouts.app')

@section('content')
<header class="flex items-center mb-3 py-4">
	<div class="flex justify-between items-center w-full">
		<h2 class="text-gray-500 font-normal text-sm">My Events</h2>
		<a href="/events/create" class="btn-blue">New Event</a>
	</div>
</header>
<main class="flex flex-wrap -mx-3">
	@forelse ($events as $event)
	<div class="w-1/3 px-3 pb-6">
		<div class="bg-white rounded shadow p-5" style="height: 200px">
			<h3 class="font-normal text-xl py-6">{{ $event->title }}</h3>
			<div class="text-gray-500">{{ str_limit($event->description, 100) }}</div>
		</div>
	</div>
	@empty	
	<div>No events yet.</div>
	@endforelse	
</main>
@endsection