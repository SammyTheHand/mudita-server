var video = videojs('video', {
	playbackRates: [.5, 1, 1.5, 2, 2.5],
	fluid: true,
	plugins: {
		hotkeys: {
    		volumeStep: 0.1,
    		seekStep: 5,
    		enableNumbers: false,
    		enableModifiersForNumbers: false
  		}
	}
});

