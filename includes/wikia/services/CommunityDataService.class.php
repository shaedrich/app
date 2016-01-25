<?php

class CommunityDataService extends WikiaService {
	const CURATED_CONTENT_VAR_NAME = 'wgWikiaCuratedContent';
	private $curatedContentData = [ ];

	private $cityId;

	function __construct( $cityId ) {
		parent::__construct();
		$this->cityId = $cityId;
	}

	public function setCuratedContent( $data ) {
		$ready = $this->isOldFormat( $data ) ? $this->toNew( $data ) : $data;
		$status = WikiFactory::setVarByName( self::CURATED_CONTENT_VAR_NAME, $this->cityId, $ready );
		if ( $status ) {
			wfWaitForSlaves();
		}
		return $status;
	}

	public function getCuratedContent() {
		return $this->curatedContentData();
	}

	public function getCuratedContentLegacyFormat() {
		return $this->toOld( $this->curatedContentData() );
	}

	public function hasCuratedContent() {
		return !empty( $this->getCuratedContent() );
	}

	/**
	 * Returns both curated and optional sections merged together
	 * @return array
	 */
	public function getNonFeaturedSections() {
		$curated = $this->getCurated();
		$optional = $this->getOptional();
		if ( !empty( $optional ) ) {
			$curated[] = $optional;
		}
		return $curated;
	}

	/**
	 * Returns filtered sections
	 * @param string $section
	 * @return array
	 */
	public function getSection( $section ) {
		return array_filter( $this->getNonFeaturedSections(),
			function ( $s ) use ( $section ) {
				return $s[ 'label' ] == $section;
			} );
	}

	public function getOptional() {
		$data = $this->getCuratedContent();
		return isset( $data[ 'optional' ] ) ? $data[ 'optional' ] : [ ];
	}

	public function getOptionalItems() {
		$opt = $this->getOptional();
		return isset( $opt[ 'items' ] ) ? $opt[ 'items' ] : [ ];
	}

	public function getCurated() {
		$data = $this->getCuratedContent();
		return isset( $data[ 'curated' ] ) ? $data[ 'curated' ] : [ ];
	}

	public function getFeatured() {
		$data = $this->getCuratedContent();
		return isset( $data[ 'featured' ] ) ? $data[ 'featured' ] : [ ];
	}

	public function getFeaturedItems() {
		$opt = $this->getFeatured();
		return isset( $opt[ 'items' ] ) ? $opt[ 'items' ] : [ ];
	}

	public function getCommunityData() {
		$data = $this->curatedContentData();

		return isset( $data[ 'community_data' ] ) ? $data[ 'community_data' ] : [ ];
	}

	public function getCommunityDescription() {
		$data = $this->getCommunityData();

		return isset( $data[ 'description' ] ) ? $data[ 'description' ] : "";
	}

	public function getCommunityImageId() {
		$data = $this->getCommunityData();

		return isset( $data[ 'image_id' ] ) ? $data[ 'image_id' ] : 0;
	}

	private function curatedContentData() {
		if ( empty( $this->curatedContentData ) ) {
			$raw = WikiFactory::getVarValueByName( self::CURATED_CONTENT_VAR_NAME, $this->cityId );

			if ( !is_array( $raw ) ) {
				$this->curatedContentData = [ ];
			} else {
				// transformation for transition phase
				$this->curatedContentData = $this->isOldFormat( $raw ) ?
					$this->toNew( $raw ) : $raw;
			}
		}

		return $this->curatedContentData;
	}

	private function toNew( $data ) {
		$result = [ ];
		foreach ( $data as $section ) {
			$extended = [
				'label' => isset( $section[ 'title' ] ) ? $section[ 'title' ] : '',
				'image_id' => isset( $section[ 'image_id' ] ) ? $section[ 'image_id' ] : 0,
				'items' => isset( $section[ 'items' ] ) ? $section[ 'items' ] : [ ]
			];

			//figure out what type of section it is
			if ( $section[ 'featured' ] ) {
				$result[ 'featured' ] = $extended;
			} elseif ( $section[ 'community_data' ] ) {
				$result[ 'community_data' ] = $section;
			} elseif ( empty( $section[ 'title' ] ) ) {
				$result[ 'optional' ] = $extended;
			} else {
				$result[ 'curated' ][] = $extended;
			}
		}

		return $result;
	}

	private function toOld( $data ) {
		$result = [ ];
		if ( !empty( $data[ 'featured' ] ) ) {
			$data[ 'featured' ][ 'featured' ] = 'true';
			$result[] = $data[ 'featured' ];
		}
		//		if ( !empty( $data[ 'community_data' ] ) ) {
		//			$data[ 'community_data' ][ 'community_data' ] = 'true';
		//			$result[] = $data[ 'community_data' ];
		//		}
		if ( !empty( $data[ 'curated' ] ) ) {
			$result = array_merge( $result, $data[ 'curated' ] );
		}
		if ( !empty( $data[ 'optional' ] ) ) {
			$result[] = $data[ 'optional' ];
		}

		return array_map( function ( $section ) {
			if ( isset( $section[ 'label' ] ) ) {
				$section[ 'title' ] = $section[ 'label' ];
				unset( $section[ 'label' ] );
			}
			return $section;
		}, $result );
	}

	/**
	 * Needs to be removed after migration of wgWikiaCuratedContent
	 * to new format
	 *
	 * @param $curatedContent array
	 * @return bool true if wgWikiaCuratedContent has old format
	 */
	private function isOldFormat( $curatedContent ) {
		return ( array_values( $curatedContent ) === $curatedContent );
	}
}
