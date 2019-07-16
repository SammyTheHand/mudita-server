@extends ('layouts.app')

@section('content')
	<div class="flex justify-between">
		<div>
			<ul class="flex justify-center font-nunito text-gray-700 mb-4">
				<li><a href="promotion" class="px-5 hover:text-brand-green">Promotion</a></li>
				<li><a href="instruction" class="px-5 hover:text-brand-green">Instruction</a></li>
				<li><a href="investor" class="px-5 hover:text-brand-green border-b-4 border-brand-green">Investor</a></li>
			</ul>
		</div>
		<div>
			<a href="#" class="align-middle mr-5 px-5 py-2 rounded-lg shadow-lg bg-brand-green hover:bg-teal-700 text-white font-nunito focus:outline-none focus:shadow-outline" download>Download</a>
		</div>
	</div>
	<video  id="my-video" 
			class="video-js vjs-big-play-centered" 
			poster="http://vjs.zencdn.net/v/oceans.png" 
			controls 
	>
		<source src="http://vjs.zencdn.net/v/oceans.mp4" type="video/mp4">
		<p class='vjs-no-js'>
	      To view this video please enable JavaScript, and consider upgrading to a web browser that
	      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
	    </p>
	</video>
	<script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
	<script src="//cdn.sc.gl/videojs-hotkeys/latest/videojs.hotkeys.min.js"></script>
	<script src="/js/main.js"></script>
@endsection