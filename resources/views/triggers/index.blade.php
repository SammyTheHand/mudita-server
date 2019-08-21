@extends ('layouts.app')

@section('content')
<div class="p-8">
	<header class="flex items-center mb-3 py-4">
		<div class="flex justify-between items-end w-full">
			<h2 class="text-gray-500 font-normal text-sm">Triggers</h2>
		</div>
	</header>
	<main>
		@if(!$triggers->isEmpty())
		    <table class="">
		    	<tr>
					<th class="text-left text-xs pr-4 uppercase">Name</th>
					<th class="text-left text-xs px-4 uppercase">Created</th>
				</tr>
				@forelse ($triggers as $trigger)
				<tr>
					<td class="text-sm pr-4">
						{{ $trigger->title }}
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
	</main>
@endsection