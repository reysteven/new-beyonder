<div class="content-title">
    <span class="inline-border"><strong>ABOUT US</strong></span>
</div>
<div id="about-section">
	<div class="col-sm-8 col-sm-offset-2 inner-section">
		<h2 class="text-center about-title" style="margin:2% 0"><?php the_title() ?></h2>
		<?php
			$url = "";
			if(has_post_thumbnail()) {
				$url = get_the_post_thumbnail_url();
			} 
		?>
		<div class="prim-img" style="background-image: url('<?php echo $url ?>')"></div>
		<div class="about-desc">
			<?php
				the_content();
			?>
		</div>
	</div>
</div>