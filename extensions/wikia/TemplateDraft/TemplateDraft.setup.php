<?php

/**
 * Wikia Template Draft Extension
 *
 * @author Adam Karmiński <adamk@wikia-inc.com>
 * @copyright (c) 2015 Wikia, Inc.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['other'][] = [
	'name'				=> 'TemplateDraft',
	'version'			=> '1.0',
	'author'			=> 'Adam Karmiński',
	'url'               => 'https://github.com/Wikia/app/tree/dev/extensions/wikia/TemplateDraft',
	'descriptionmsg'    => 'templatedraft-description',
];

/**
 * Messages
 */
$wgExtensionMessagesFiles['TemplateDraft'] = __DIR__ . '/TemplateDraft.i18n.php';

/**
 * Hooks
 */
$wgAutoloadClasses['TemplateDraftHooks'] = __DIR__ . '/TemplateDraftHooks.class.php';
$wgHooks['GetRailModuleList'][] = 'TemplateDraftHooks::onGetRailModuleList';

/**
 * Right rail module
 */
$wgAutoloadClasses['TemplateDraftModuleController'] = $IP . '/skins/oasis/modules/TemplateDraftModuleController.class.php';