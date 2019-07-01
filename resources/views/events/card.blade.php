<div class="card" style="height: 200px">
	<h3 class="font-normal text-xl py-6 -ml-5 mb-3 border-l-4 border-blue-400 pl-4">
		<a href="{{ $event->path() }}">{{ $event->title }}</a>
	</h3>
	<div class="mb-8 flex-1">{{ str_limit($event->description, 100) }}</div>
</div>