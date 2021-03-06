/*global define*/
define('ext.wikia.adEngine.wrappers.prebid', [
	'wikia.window'
], function (win) {
	'use strict';

	/*
	 * When updating prebid.js (https://github.com/prebid/Prebid.js/) to a new version
	 * remember about the additional [320, 480] slot size, see:
	 * https://github.com/Wikia/app/pull/12269/files#diff-5bbaaa809332f9adaddae42c8847ae5bR6015
	 */
	var validResponseStatusCode = 1,
		errorResponseStatusCode = 2;

	win.pbjs = win.pbjs || {};
	win.pbjs.que = win.pbjs.que || [];

	function get() {
		return win.pbjs;
	}

	function getBidByAdId(adId) {
		if (!win.pbjs || !win.pbjs._bidsReceived) {
			return null;
		}

		var bids = win.pbjs._bidsReceived.filter(function (bid) {
			return adId === bid.adId;
		});

		return bids.length ? bids[0] : null;
	}

	function push(callback) {
		win.pbjs.que.push(callback);
	}

	return {
		validResponseStatusCode: validResponseStatusCode,
		errorResponseStatusCode: errorResponseStatusCode,
		get: get,
		getBidByAdId: getBidByAdId,
		push: push
	};
});
