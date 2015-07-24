/**
 * This file is executed on the Special:CuratedTour page.
 */
require(
	[
		'wikia.cookies',
		'jquery',
		'mw',
		'ext.wikia.curatedTour.tourGuide'
	],
	function (cookies, $, mw, TourGuide) {
		'use strict';

		//if (mw.config.get('initTourPlan') === true) {
		//	$('.curated-tour-special-plan-button').on('click', editBox.init);
		//	$('.curated-tour-special-edit-button').on('click', editBox.init);
		//}
		//if( cookies.get( 'curatedTourEditEditMode' ) !== null ) {
		//	editBox.init();
		//}

		var playButton = $('.ct-play-button');
		if (playButton.length > 0) {
			playButton.on('click', TourGuide.startTour);
		}
	}
);