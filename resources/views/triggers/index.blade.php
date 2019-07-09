@extends ('layouts.app')

@section('content')
<header class="flex items-center mb-3 py-4">
	<div class="flex justify-between items-end w-full">
		<h2 class="text-gray-500 font-normal text-sm">Triggers</h2>
	</div>
</header>
<main class="-mx-3">
		@forelse ($triggers as $trigger)
		<ul>{{ $trigger->created_at }} - Received Trigger</ul>
	@empty	
	<div>No triggers yet.</div>
	@endforelse	
</main>
@endsection