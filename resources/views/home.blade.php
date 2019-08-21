@extends('layouts.app')

@section('content')
<div class="p-8 flex">
	<div class="w-4/5">
		@if (session('status'))
		    <div class="card mt-4" role="alert">
		        <h4 class="text-brand-green text-lg">{{ session('status') }}</h4>
		    </div>
		@endif
		<div class="flex items-center pb-2">
			<h1 class="pr-4 font-bold">Recent Events</h1>
			<a href="{{ url('/events') }}" class="text-sm underline hover:no-underline">See all events</a>
		</div>

		@if(!$events->isEmpty())
		    <table class="">
		    	<tr>
					<th class="text-left text-xs pr-4 uppercase">Title</th>
					<th class="text-left text-xs px-4 uppercase">Created</th>
					<th class="text-left text-xs px-4 uppercase">Participants</th>
					<th class="text-left text-xs px-4 uppercase">Completed</th>
				</tr>
				@forelse ($events as $event)
				<tr>
					<td class="text-sm pr-4">
						<a href="{{ $event->path() }}" class="underline hover:no-underline text-brand-green">{{ $event->title }}</a>
					</td>
					<td class="text-sm px-4">{{ \Carbon\Carbon::parse($event->created_at)->format('d/m/Y')}}</td>
				</tr>
				@empty
					<h1>Nothing</h1>
				@endforelse
			</table>
		@else
		    <h2>No recent events.</h2>
		@endif

		<div class="flex items-center pt-8 pb-2">
			<h1 class="pr-4 font-bold">Recent Triggers</h1>
			<a href="{{ url('/triggers') }}" class="text-sm underline hover:no-underline">See all triggers</a>
		</div>
		@if(!$triggers->isEmpty())
		    <table class="">
		    	<tr>
					<th class="text-left text-xs pr-4 uppercase">Name</th>
					<th class="text-left text-xs px-4 uppercase">Created</th>
				</tr>
				@forelse ($triggers as $trigger)
				<tr>
					<td class="text-sm pr-4">
						<a href="{{ url('/triggers') }}" class="underline hover:no-underline text-brand-green">{{ $trigger->title }}</a>
					</td>
					<td class="text-sm px-4">{{ \Carbon\Carbon::parse($trigger->created_at)->format('d/m/Y H:i:s')}}</td>
				</tr>
				@empty
					<h1>Nothing</h1>
				@endforelse
			</table>
		@else
		    <h2>No recent triggers.</h2>
		@endif 
	</div>
	<div class="w-1/5">
		<div class="flex justify-end">
			<a href="/events/create" class="bg-brand-green text-white text-base px-4 py-2 rounded shadow hover:bg-teal-700 focus:outline-none focus:shadow-outlin">Create a new event</a>
		</div>
	</div>
</div>
@endsection
