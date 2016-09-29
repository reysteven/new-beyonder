<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area" style="width:100% !important; margin-top:12px">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<div class="col-xs-12">
			<?php
				echo do_shortcode("[R-slider id='1']");
				// Start the loop.
				// while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					// get_template_part( 'template-parts/content', get_post_format() );

				// End the loop.
				// endwhile;

				// Previous/next page navigation.
				// the_posts_pagination( array(
				// 	'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				// 	'next_text'          => __( 'Next page', 'twentysixteen' ),
				// 	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
				// ) );

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
			?>
			</div>
			<?php if ( is_home() && is_front_page() ) : ?>
				<div class="col-sm-12">
					<h1 class="page-title screen-reader-text">TEST TITLE</h1>
				</div>
			<?php endif; ?>
			<div id="home-main-content">
				<div class="col-sm-3">
					<!-- Begin MailChimp Signup Form -->
					<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
					<style type="text/css">
						#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
						/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
						   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
					</style>
					<div id="mc_embed_signup">
						<form action="//gridpredict.us14.list-manage.com/subscribe/post?u=bc163769c209b8ea406840a88&amp;id=35b9d64a0e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate style="padding:0">
						    <div id="mc_embed_signup_scroll" class="left-section">
						    	<div class="inner-left-section subscribe">
						    		<div class="text-center" style="margin:15px 0">_____</div>
						    		<div class="text-center subscribe-title">
										<label for="mce-EMAIL">SIGN UP FOR OUR<br>NEWSLETTER NOW</label>
									</div>
									<div class="text-center email-section">
										<input type="email" value="" name="EMAIL" class="email form-control text-center" id="mce-EMAIL" placeholder="Type your email here" required>
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
					<div class="left-section">
						<div class="inner-left-section popular">
							<div class="text-center popular-title1"><strong>POPULAR</strong></div>
							<div class="text-center popular-title2"><strong>ARTICLES</strong></div>
							<div class="popular-list">
								<?php
									$articleArray = [];
									while ( have_posts() ) : the_post();
										$tempArray = [
											"url" => get_permalink(),
											"title" => get_the_title(),
											"date" => get_post_time('d F Y'),
											"author" => get_the_author(),
											"pv" => init_wpb_set_post_views(get_the_ID())
										];
										array_push($articleArray,$tempArray);
									endwhile;

									// SORTING POSTS
									// -------------
									$flag = false;
									while($flag == false) {
										$flag = true;
										for($i=0;$i<sizeof($articleArray)-1;$i++) {
											$curr = json_decode(json_encode($articleArray[$i]), true);
											$next = json_decode(json_encode($articleArray[$i+1]), true);
											if($curr['pv'] < $next['pv']) {
												$flag = false;
												$articleArray[$i] = json_decode(json_encode($next), true);
												$articleArray[$i+1] = json_decode(json_encode($curr), true);
											}
										}
									}
									// die(json_encode($articleArray));

									// SHOW POPULAR ARTICLES
									// ---------------------
									$i = 0;
									foreach($articleArray as $d) {
								?>
								<a href="<?php echo $d['url'] ?>">
									<div class="popular-item">
										<div class="date"><?php echo $d['date'] ?></div>
										<div class="title"><strong><?php echo $d['title'] ?></strong></div>
										<div class="author">Author by <?php echo $d['author'] ?></div>
									</div>
								</a>
								<?php
										$i++;
										if($i == 5) {
											break;
										}
									}
								?>
								<div class="text-center" style="margin:15px 0">_________</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-9">
					<div class="news-section col-sm-12">
						<div class="title">
							<span><strong>NEWS</strong></span>
						</div>
						<div class="featured-news col-sm-12">
							<?php
								$args = array(
									'posts_per_page' => 3,
									'category_name' => 'News',
									'orderby' => 'post_modified',
									'order' => 'DESC',
									'post_type' => 'post'
								);

								$recent_posts = new WP_Query($args);
								while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							?>
							<a href="<?php echo get_permalink() ?>" class="link-item">
								<div class="news-item item col-sm-4">
									<?php
										$url = "";
										if(has_post_thumbnail()) {
											$url = get_the_post_thumbnail_url();
										} 
									?>
									<div class="news-img img" style="background-image: url('<?php echo $url ?>')"></div>
									<div class="news-title link-item-text text-center"><strong><?php the_title() ?></strong></div>
									<div class="news-desc link-item-text text-center"><?php content('10') ?></div>
								</div>
							</a>
							<?php
								endwhile
							?>
							<div class="col-sm-12 text-center home-see-more">
								<a href="index.php/news" class="btn btn-warning">See more</a>
							</div>
						</div>
					</div>
					<div class="reviews-section col-sm-12">
						<div class="title">
							<span><strong>REVIEWS</strong></span>
						</div>
						<div class="featured-reviews col-sm-12">
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
								<div class="news-item item col-sm-4">
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
							<div class="col-sm-12 text-center home-see-more">
								<a href="index.php/reviews" class="btn btn-warning">See more</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="tutorial-section col-sm-12">
						<div class="title">
							<span><strong>TUTORIAL</strong></span>
						</div>
						<div class="featured-tutorials col-sm-12">
							<?php
								$args = array(
									'posts_per_page' => 4,
									'category_name' => 'Tutorial',
									'orderby' => 'post_modified',
									'order' => 'DESC',
									'post_type' => 'post'
								);

								$recent_posts = new WP_Query($args);
								while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
							?>
							<a href="<?php echo get_permalink() ?>" class="link-item">
								<div class="tutorial-item item col-sm-3">
									<?php
										$url = "";
										if(has_post_thumbnail()) {
											$url = get_the_post_thumbnail_url();
										} 
									?>
									<div class="tutorial-img img" style="background-image: url('<?php echo $url ?>')"></div>
									<div class="tutorial-title link-item-text text-center"><strong><?php the_title() ?></strong></div>
									<div class="tutorial-desc link-item-text text-center"><?php content('10') ?></div>
								</div>
							</a>
							<?php
								endwhile
							?>
							<div class="col-sm-12 text-center home-see-more">
								<a href="index.php/tutorial" class="btn btn-warning">See more</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
