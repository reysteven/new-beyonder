<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="col-sm-12 inner-footer">
				<div class="col-sm-3">
					<h4>Supported by</h4>
					<a href="http://www.gridpredict.jp/">
						<img src="<?php bloginfo('template_directory') ?>/img/logo/grid-logo.png" alt="grid">
					</a>
					<p style="margin:0">GRID Indonesia</p>
					<p style="margin:0">UOB Plaza</p>
					<p style="margin:0">Podium Chubb Square Mezzannine floor</p>
					<p style="margin:0">Jalan M.H. Thamrin No. 10</p>
					<p style="margin:0">Kebon Melati, Tanah Abang</p>
					<p style="margin:0">Jakarta Pusat 10230</p>
					<p style="margin:0">Indonesia</p>
				</div>
				<div class="col-sm-3">
					<p style="margin:0">GRID inc. Japan</p>
					<p style="margin:0">3F Shinakasaka building,</p>
					<p style="margin:0">Akasaka3-13-10, Minato-ku,</p>
					<p style="margin:0">Tokyo, JAPAN 107-0052</p>
				</div>
				<div class="col-sm-3">
					<p style="font-size:16px; margin:0 0 10px"><a href="index.php/news" style="color:black">News</a></p>
					<p style="font-size:16px; margin:0 0 10px"><a href="index.php/reviews" style="color:black">Reviews</a></p>
					<p style="font-size:16px; margin:0 0 10px"><a href="index.php/tutorial" style="color:black">Tutorial</a></p>
					<p style="font-size:16px; margin:0 0 10px"><a href="index.php/submit-article" style="color:black">Submit Your News</a></p>
					<p style="font-size:16px; margin:0 0 10px"><a href="index.php/advertise-with-us" style="color:black">Advertise with Us</a></p>
					<p style="font-size:16px; margin:0 0 10px"><a href="index.php/contact" style="color:black">Contact</a></p>
				</div>
				<div class="col-sm-3">
					<h4 class="text-center">Machine Learning</h4>
					<h4 class="text-center">Framework</h4>
					<a href="http://www.renom.jp/">
						<img src="<?php bloginfo('template_directory') ?>/img/logo/renom-logo.png" alt="renom" style="max-width:200%">
					</a>
					<div class="social-wrapper" style="padding: 20px 63px 0 0">
						<?php the_social_links() ?>
					</div>
				</div>
				<div class="col-sm-12 text-center">Copyright©2016 GRID inc. All rights reserved.</div>
			</div>
		</footer><!-- .site-footer -->

		<!-- JQUERY -->
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-3.1.0.min.js"></script>

		<!-- CUSTOM JS -->
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

		<!-- BOOTSTRAP JS -->
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>

	</div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
