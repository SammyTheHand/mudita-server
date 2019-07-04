<div class="card mt-3">
	<ul class="text-sm">
		@foreach ($event->activity as $activity)
		<li class="{{ $loop->last ? '' : 'mb-1' }}">
			@include("events.activity.{$activity->description}")
			<span class="text-gray-600 text-xs">{{ $activity->created_at->diffForHumans() }}</span>
		</li>
		@endforeach
	</ul>
</div>