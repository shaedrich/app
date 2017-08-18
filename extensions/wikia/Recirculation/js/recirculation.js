require([
	'jquery',
	'wikia.window',
	'wikia.log',
	'ext.wikia.recirculation.utils',
	'ext.wikia.recirculation.views.mixedFooter',
	'ext.wikia.recirculation.helpers.liftigniter',
	'ext.wikia.recirculation.helpers.discussions',
	'ext.wikia.recirculation.discussions',
	require.optional('videosmodule.controllers.rail')
], function ($,
             w,
             log,
             utils,
             mixedFooter,
             liftigniter,
             discussions,
             oldDiscussions,
             videosModule) {
	'use strict';

	var $mixedContentFooter = $('#mixed-content-footer'),
		railRecirculation = {
			max: 5,
			widget: 'wikia-rail',
			width: 320,
			height: 180,
			modelName: 'ns',
			opts: {
				resultType: 'cross-domain',
				domainType: 'fandom.wikia.com'
			}
		},
		mixedContentFooter = {
			nsItems: {
				max: $mixedContentFooter.data('number-of-ns-articles'),
				widget: 'wikia-impactfooter',
				width: 386,
				height: 337,
				modelName: 'ns',
				opts: {
					resultType: 'cross-domain',
					domainType: 'fandom.wikia.com'
				}
			},
			wikiItems: {
				max: $mixedContentFooter.data('number-of-wiki-articles'),
				widget: 'wikia-footer-wiki-rec',
				width: 386,
				height: 337,
				modelName: 'wiki'
			}
		};

	if (w.wgContentLanguage !== 'en') {
		if (videosModule) {
			videosModule('#recirculation-rail');
		}
		oldDiscussions();
		return;
	}

	// prepare & render right rail recirculation module
	liftigniter.prepare(railRecirculation).done(function (data) {
		require(['ext.wikia.recirculation.views.premiumRail'], function (viewFactory) {
			viewFactory().render(data);
		});
	});

	// prepare & render mixed content footer module
	var mixedContentFooterData = [
		liftigniter.prepare(mixedContentFooter.nsItems),
		liftigniter.prepare(mixedContentFooter.wikiItems),
		discussions.prepare()
	];
	$.when.apply($, mixedContentFooterData).done(function (nsItems, wikiItems, discussions) {
		require(['ext.wikia.recirculation.views.mixedFooter'], function (viewFactory) {
			viewFactory().render({
				nsItems: nsItems,
				wikiItems: wikiItems,
				discussions: discussions
			});
		});
	});

	// fetch data for all recirculation modules
	// TODO lazy load some data on scroll
	liftigniter.fetch('ns');
	liftigniter.fetch('wiki');
	discussions.fetch();

	// TODO handle errors
	// TODO LI tracking
});
