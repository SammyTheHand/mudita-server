  <!DOCTYPE html>
<html>
<head>
	<title>Mudita</title>
</head>
<body>
	<h1>Mudita</h1>
	<ul>
		@forelse ($events as $event)
		<li>
			<a href="{{ $event->path() }}">{{ $event->title }}</a>
		</li>
		@empty
		<li>No Events yet.</li>
		@endforelse
	</ul>
</body>
</html>