<section class="LatestPhotosModule module">
	<h1>Latest Photos</h1>
	<?= (!empty($wgEnableUploads)) ? Wikia::specialPageLink('Upload', 'oasis-add-photo', (!$isUserLoggedIn ? 'wikia-button upphotoslogin' :'wikia-button upphotos'), 'blank.gif', 'oasis-add-photo', 'sprite photo') : '' ?>
	<div class="tally counter">
		<?= wfMsgExt('oasis-latest-photos-header', array( 'parsemag' ), $total, ($total < 100000 ? 'fixedwidth' : '') ) ?>
	</div>

<?php
if ($enableEmptyGallery == true) { ?>
	<div class="empty-photos">
		<div class="temp-image">
			 <?= Wikia::specialPageLink('Upload', 'oasis-latest-photos-empty'); ?>
		</div>
	</div>
<?php }
else {
	 ?>
	<?php
	$class = "";
	if ($enableScroll == false) {
		$class = " hidden";
	}
		?>
		<a href="#" class="previous<?= $class ?>"><img src="<?= $wgBlankImgUrl; ?>" class="latest-images-left" height="0" width="0"></a>
		<a href="#" class="next<?= $class ?>"><img src="<?= $wgBlankImgUrl; ?>" class="latest-images-right" height="0" width="0"></a>
	<div class="carousel-container">
		<div>
			<ul class="carousel">
	<?php
	// macbre: how many images to show at the page load, next images will be lazy loaded
	$load = 3;
	foreach ($thumbUrls as $i => $url) {?>
		<li class="thumbs"><a class="image" ref="<?= $url["image_filename"] ?> " href="<?= $url["file_url"] ?>">
			<img class="thumbimage" <?= $i < $load ? 'src' : 'data-src' ?>="<?= $url["thumb_url"] ?>" />
		</a>

		<span class="thumbcaption">
			<span class="thumbcaption-metadata"><?= wfMsg('oasis-latest-photos-by', $url['image_filename_short'], $url['user_href'], $url['date']) ?></span>
			<?php
		if (count($url["links"]) >= 1) { ?>
			<span class="thumbcaption-posted-in"><?= wfMsg('oasis-latest-photos-posted-in', implode(', ', $url["links"] )) ?></span>
		<?php
		}
			?>
		</span>
		</li>
	<?php
	}
	?>
	<?php
	if (count($thumbUrls) > 2) { ?>
		<li class="see-all">
			<?= Wikia::specialPageLink('NewFiles', 'oasis-latest-photos-inner-message') ?>
			<img data-src="<?= $wgStylePath ?>/oasis/images/empty_gallery.png" />
		</li>
	<?php
	}
	else {?>
		<li class="add-more single-photo"><?= Wikia::specialPageLink('Upload', 'oasis-latest-photos-single') ?></li>
		<?php

	}?>

			</ul>
		</div>
	</div>
	<?= Wikia::specialPageLink('NewFiles', 'oasis-latest-photos-more', array('class' => 'more')) ?>


<?php }
	?>
</section>