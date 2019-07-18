<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Mudita - Event Building.</title>
	<meta name="author" content="Sam Smallman">
	<meta name="description" content="Mudita - Event Building.">
	<meta name="keywords" content="mudita, production, event, theatre, sam smallman">

	<!-- Scripts -->
	<link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
	
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
	<header class="mt-2">
		<a href="/" class="px-5 text-4xl font-nunito font-medium text-gray-700">Mudita</a>
	</header>
	<main>
		<div class="flex justify-center">
			<div>
				<ul class="flex justify-center font-nunito text-gray-700 mb-4 font-semibold leading-loose tracking-wide">
					<li><a href="promotion" class="px-5 hover:text-brand-green">Promotion</a></li>
					<li><a href="instruction" class="px-5 hover:text-brand-green">Instruction</a></li>
					<li><a href="investor" class="px-5 hover:text-brand-green border-b-4 border-brand-green">Investor</a></li>
				</ul>
			</div>
		</div>
		<div class="flex m-4 justify-center">
			<div class="w-3/4">
				<video  id="video" 
						class="video-js vjs-big-play-centered" 
						poster="/assets/image/mudita-logo.png" 
						controls 
				>
					<source src="https://s3-eu-west-1.amazonaws.com/artificers.io/apps/mudita/investor.mp4" type="video/mp4">
					<p class='vjs-no-js'>
					To view this video please enable JavaScript, and consider upgrading to a web browser that
					<a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
					</p>
				</video>
				<script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
				<script src="//cdn.sc.gl/videojs-hotkeys/latest/videojs.hotkeys.min.js"></script>
				<script src="/js/main.js"></script>
			</div>
		</div>
	</main>
</body>
</html>