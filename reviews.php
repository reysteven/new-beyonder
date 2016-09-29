<div id="reviews-main-content">
	<div class="col-sm-9" style="width:81.6%">
		<div class="reviews-section col-sm-12">
			<div class="title">
				<span><strong>REVIEWS</strong></span>
			</div>
			<div class="reviews-list col-sm-12">
				<?php
					$args = array(
						'posts_per_page' => 3,
						'category_name' => 'Reviews',
						'orderby' => 'post_modified',
						'order' => 'DESC',
						'post_type' => 'post'
					);

					$recent_posts = new WP_Query($args);
					while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
				?>
				<a href="<?php echo get_permalink() ?>" class="link-item">
					<div class="reviews-item item col-sm-3">
						<?php
							$url = "";
							if(has_post_thumbnail()) {
								$url = get_the_post_thumbnail_url();
							} 
						?>
						<div class="reviews-img img" style="background-image: url('<?php echo $url ?>')"></div>
						<div class="reviews-title link-item-text text-center"><strong><?php the_title() ?></strong></div>
						<div class="reviews-desc link-item-text text-center"><?php content('10') ?></div>
					</div>
				</a>
				<?php
					endwhile
				?>
			</div>
		</div>
	</div>
	<div class="col-sm-3" style="width:18.4%">
		<!-- Begin MailChimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
			/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
			   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
		</style>
		<div id="mc_embed_signup">
			<form action="//gridpredict.us14.list-manage.com/subscribe/post?u=bc163769c209b8ea406840a88&amp;id=35b9d64a0e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate style="padding:0">
			    <div id="mc_embed_signup_scroll" class="right-section">
			    	<div class="inner-right-section subscribe">
			    		<div class="text-center" style="margin:15px 0">_____</div>
			    		<div class="text-center subscribe-title">
							<label for="mce-EMAIL">SIGN UP FOR OUR<br>NEWSLETTER NOW</label>
						</div>
						<div class="text-center email-section">
							<input type="email" value="" name="EMAIL" class="email form-control text-center" id="mce-EMAIL" placeholder="Type your email here" required style="width:100%">
						</div>
					    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
					    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bc163769c209b8ea406840a88_35b9d64a0e" tabindex="-1" value=""></div>
					    <div class="text-center subscribe-submit">
					    	<!-- <input type="submit" value="SUBSCRIBE" name="subscribe" class="btn btn-default"> -->
					    	<button type="submit" name="subscribe" class="btn btn-default text-center">
					    		<div>SUBSCRIBE</div>
					    	</button>
					    </div>
					    <div class="text-center" style="margin:15px 0">_________</div>
				    </div>
			    </div>
			</form>
		</div>
		<!--End mc_embed_signup-->
		<div class="banner-section">
			<div class="inner-right-section banner">
				<img src="<?php bloginfo('template_directory'); ?>/img/banner/ad-banner.png" width="100%">
			</div>
		</div>
	</div>
	<!-- <div class="col-sm-9 text-center" style="width:81.6%">
		<a href="<?php echo '?page='.($page-1) ?>" class="pagination-link <?php echo ($page <= 1) ? 'hidden' : '' ?>"><</a>
		<a href="?page=1" class="pagination-link <?php echo ($page <= 1) ? 'active' : '' ?>">1</a>
		<a href="?page=2" class="pagination-link <?php echo ($page == 2) ? 'active' : '' ?>">2</a>
		<a href="?page=3" class="pagination-link <?php echo ($page == 3) ? 'active' : '' ?>">3</a>
		<a href="?page=4" class="pagination-link <?php echo ($page == 4) ? 'active' : '' ?>">4</a>
		<a href="?page=5" class="pagination-link <?php echo ($page == 5) ? 'active' : '' ?>">5</a>
		<a href="#" class="pagination-link">...</a>
		<a href="<?php echo '?page='.($page+1) ?>" class="pagination-link">></a>
	</div> -->
</div>