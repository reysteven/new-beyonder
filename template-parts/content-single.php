<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header hidden">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php //twentysixteen_post_thumbnail(); ?>

	<div class="entry-content hidden">
		<?php
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer hidden">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->

	<div style="margin:0.5% 1.2%">
		<span style="color:rgb(174,174,174)">News</span> / <?php the_title() ?>
	</div>
	<div id="article-main-content">
		<div class="col-sm-9" style="width:81.6%">
			<div class="article-section col-sm-12">
				<div class="article-title-section">
					<div class="col-sm-3 text-left" style="padding:0">
						<?php
							if(get_previous_post() != "") {
						?>
						<a href="<?php echo get_previous_post()->guid ?>" class="btn btn-default prev-link-btn"><</a>
						<div class="prev-desc">
							<strong style="font-size:18px">Prev</strong><br>
							<div class="prev-title"><?php echo get_previous_post()->post_title ?></div>
						</div>
						<?php
							}
						?>
					</div>
					<div class="col-sm-6 text-center">
						<h3><?php the_title() ?></h3>
					</div>
					<div class="col-sm-3 text-right" style="padding:0 0 0 0">
						<?php
							if(get_next_post() != "") {
						?>
						<a href="<?php echo get_next_post()->guid ?>" class="btn btn-default prev-link-btn" style="float:right; line-height: 58px;">></a>
						<div class="next-desc text-right" style="margin-left:auto; float:right">
							<strong style="font-size:18px; float:right; padding-top:15px">Next</strong><br>
							<div class="next-title" style="float:right"><?php echo get_next_post()->post_title ?></div>
						</div>
						<?php
							}
						?>
					</div>
				</div>
				<div class="text-center col-sm-12">
					<!-- <div class="social-wrapper"> -->
						<!-- <i style="font-size:10px">Share</i> -->
						<!-- <a href="#">
							<img src="assets/img/social-icon/insta-icon.png" alt="instagram" class="social-icon">
						</a>
						<a href="#">
							<img src="assets/img/social-icon/yutub-icon.png" alt="youtube" class="social-icon">
						</a>
						<a href="#">
							<img src="assets/img/social-icon/twit-icon.png" alt="twitter" class="social-icon">
						</a>
						<a href="#">
							<img src="assets/img/social-icon/fb-icon.png" alt="facebook" class="social-icon">
						</a> -->
					<!-- </div> -->
					<div class="col-sm-4 col-sm-offset-4" style="margin-left:37.3%; height:30px">
						<?php
							wp_social_bookmarking_light_output_e();
						?>
					</div>
				</div>
				<?php
					$url = "";
					if(has_post_thumbnail()) {
						$url = get_the_post_thumbnail_url();
					} 
				?>
				<div class="article-prim-img col-sm-12" style="background-image:url('<?php echo $url ?>')"></div>
				<!-- <div class="article-img-caption col-sm-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</div> -->
				<div class="col-sm-12" style="padding:0">
					<div class="col-sm-2 user-pic-section text-center">
						<div class="user-pic col-sm-6 col-sm-offset-3" style="background-image:url('<?php echo get_avatar_url(get_the_author_meta('ID')) ?>')"></div>
						<div class="col-sm-12">
							<strong>Author</strong><br>
							<?php the_author() ?>
						</div>
						<!-- <?php twentysixteen_entry_meta(); ?> -->
					</div>
					<div class="col-sm-10">
						<?php the_content() ?>
					</div>
				</div>
				<div class="other-section col-sm-12">
					<div class="title">
						<span><strong>OTHER ARTICLES</strong></span>
					</div>
					<div class="other-article col-sm-12">
						<?php
							$tags = wp_get_post_tags(get_the_ID());
							if($tags) {
								$first_tag = $tags[0]->term_id;
								$args=array(
									'tag__in' => array($first_tag),
									'post__not_in' => array($post->ID),
									'posts_per_page'=>5,
									'caller_get_posts'=>1
								);
								$my_query = new WP_Query($args);
								if( $my_query->have_posts() ) {
									while ($my_query->have_posts()) : $my_query->the_post();
						?>
						<a href="<?php get_permalink() ?>" class="link-item">
							<div class="other-item item col-sm-3">
								<?php
									$url = "";
									if(has_post_thumbnail()) {
										$url = get_the_post_thumbnail_url();
									} 
								?>
								<div class="other-img img" style="background-image: url('<?php echo $url ?>')"></div>
								<div class="other-title link-item-text text-center"><strong><?php the_title() ?></strong></div>
								<div class="other-desc link-item-text text-center"><?php content('10') ?></div>
							</div>
						</a>
						<?php
									endwhile;
								}
								wp_reset_query();
							}
						?>
					</div>
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
	</div>
</article><!-- #post-## -->
