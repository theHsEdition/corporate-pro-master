<?php
/**
 * Corporate Pro
 *
 * This file adds the landing page template to the Corporate Pro Theme.
 *
 * Template Name: Industry Page
 *
 * @package   SEOThemes\CorporatePro
 * @link      https://seothemes.com/themes/corporate-pro
 * @author    SEO Themes
 * @copyright Copyright © 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_filter( 'body_class', 'corporate_add_service_body_class' );
/**
 * Add landing page body class to the head.
 *
 * @since  1.0.0
 *
 * @param  array $classes Array of body classes.
 *
 * @return array
 */
function corporate_add_service_body_class( $classes ) {
	$classes[] = 'service-page';

	return $classes;
}

?>

<div id="primary" class="industry-page content-area">
	<main id="main" class="site-main">

	<?php $postThumbnail = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
	<section class="section-header" style="background-position: 10%; background-image: url(<?php echo $postThumbnail; ?>);">
		<div class="sizer">

			<div class="grid-half">

				<?php 
					$main_title = get_field('main_title');
					$main_subtitle = get_field('main_subtitle');
					$main_content = get_field('main_content');
					$main_button_text = get_field('main_button_text');
					$main_button_link = get_field('main_button_link');
					$main_image = get_field('main_image');
				 ?>

				<div class="hero-callout">
					<h1><?php echo $main_title; ?></h1>
					<p class="subtitle"><strong><?php echo $main_subtitle; ?></strong></p>
					<p><?php echo $main_content; ?></p>
				</div>
				<div></div>

			</div>

		</div>
	</section>

	<!-- // Main Section (Added in ACF) -->
	<?php if (get_field('section_-_highlight') == "On") {
		get_template_part('/partials/section-highlight');
	} ?>

	<!-- // Features (Added in ACF) -->
	<?php if (get_field('section_-_features') == "On") {
		get_template_part('/partials/section-features');
	} ?>	

	<!-- // Services Section (Added in ACF) -->
	<?php if (get_field('services-_section') == "On") {
		get_template_part('/partials/section-services');
	} ?>

	<!-- // Client Quote Section (Added in ACF) -->
	<?php if (get_field('quote_-_section') == "On") {
		get_template_part('/partials/section-client-quote');
	} ?>

	<!-- // Call to Action Section (Added in ACF) -->
	<?php if (get_field('cta_-_section') == "On") {
		get_template_part('/partials/section-call-to-action');
	} ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php

// add_action( 'wp_enqueue_scripts', 'corporate_dequeue_skip_links' );
// /**
//  * Dequeue Skip Links script.
//  *
//  * @since  1.0.0
//  *
//  * @return void
//  */
// function corporate_dequeue_skip_links() {
// 	wp_dequeue_script( 'skip-links' );
// }

// remove page content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

// Remove Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

// Force full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Remove default hero section.
remove_action( 'genesis_before_content_sidebar_wrap', 'corporate_hero_section' );

// Remove breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Run the Genesis loop.
genesis();


