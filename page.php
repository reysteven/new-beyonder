<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area" style="width:100%">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			// get_template_part( 'template-parts/content', 'page' );
			// echo get_the_ID();
			if(get_the_ID() == 4) {
				include_once('news.php');
			}else if(get_the_ID() == 6) {
				include_once('reviews.php');
			}else if(get_the_ID() == 8) {
				include_once('tutorial.php');
			}else if(get_the_ID() == 10 || get_the_ID() == 12) {
				include_once('about.php');
			}else if(get_the_ID() == 14) {
				include_once('contact.php');
			}else if(get_the_ID() == 64) {
				include_once('advertise.php');
			}else if(get_the_ID() == 66) {
				include_once('submit-article.php');
			}else {
				echo "SOMETHING WRONG!!!";
			}

		?>
			<div class="col-sm-9 text-center" style="width:81.6%">
		<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );
		?>
			</div>
		<?php

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) {
			// 	comments_template();
			// }

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<!-- <?php get_sidebar( 'content-bottom' ); ?> -->

</div><!-- .content-area -->

<?php get_footer(); ?>
