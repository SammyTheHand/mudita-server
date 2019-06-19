<!DOCTYPE html>
<html>
<head>
	<title>Mudita</title>
</head>
<body>
	<h1>Mudita</h1>
	<ul>
		@foreach ($events as $event)
		<li>{{ $event->title }}</li>
		@endforeach
	</ul>
</body>
</html>