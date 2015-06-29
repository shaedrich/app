<?php

class TemplateDraftModuleController extends WikiaController {

	/**
	 * Controller method for draft creation module
	 * @param $params
	 */
	public function executeCreate( $params ) {
		$this->wg->Out->addStyle(
			AssetsManager::getInstance()->getSassCommonURL( "skins/oasis/css/modules/TemplateDraftModule.scss" )
		);

		$subpage = wfMessage( 'templatedraft-subpage' )->inContentLanguage()->escaped();
		$subpageTitle = Title::newFromText( $this->app->wg->Title->getText() . '/' . $subpage, NS_TEMPLATE );
		$this->draftUrl = $subpageTitle->getFullUrl( [
			'action' => 'edit',
			TemplateConverter::CONVERSION_MARKER => 1,
		] );
	}

	/**
	 * Controller method for draft approval module
	 * @param $params
	 */
	public function executeApprove( $params ) {
		$this->wg->Out->addStyle(
			AssetsManager::getInstance()->getSassCommonURL( "skins/oasis/css/modules/TemplateDraftModule.scss" )
		);

		/**
		 * TODO: Make a better URL composing script
		 */
		$titleUrl = $this->app->wg->Title->getFullURL();
		$this->draftUrl = "{$titleUrl}?action=approvedraft";
	}
}
