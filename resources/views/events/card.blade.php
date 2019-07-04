<div class="card" style="height: 200px">
	<h3 class="font-normal text-xl py-4 -ml-5 mb-3 border-l-4 border-blue-400 pl-4">
		<a href="{{ $event->path() }}" class="text-black-900 no-underlin">{{ $event->title }}</a>
	</h3>
	<div class="text-gray-800 mb-8">{{ str_limit($event->description, 100) }}</div>
	<footer>
		<form method="POST" action="{{ $event->path() }}" class="text-right">
			@csrf
			@method('DELETE') 
			<button type="submit" class="text-xs">Delete</button>
		</form>
	</footer>
</div>