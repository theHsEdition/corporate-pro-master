<?php
/**
 * Corporate Pro
 *
 * This file adds the landing page template to the Corporate Pro Theme.
 *
 * Template Name: Service Page
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

remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

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

<div id="primary" class="content-area">
	<main id="main" class="site-main">

	<section class="section-header">
		<div class="sizer">

		<div class="grid-half">

			<?php 
				$main_title = get_field('main_title');
				$main_subtitle = get_field('main_subtitle');
				$main_button_text = get_field('main_button_text');
				$main_button_link = get_field('main_button_link');
				$main_image = get_field('main_image');

				$cta_title = get_field('cta_title');
				$cta_subtitle = get_field('cta_subtitle');
				$cta_image = get_field('cta_image');
			 ?>

			<div class="hero-callout">
				<h1><?php echo $main_title; ?></h1>
				<p><?php echo $main_subtitle; ?></p>
				<a href="<?php echo $main_button_link; ?>" class="n-button n-button-primary"><?php echo $main_button_text; ?></a>
			</div>

			<div>
				<img src="<?php echo $main_image["url"]; ?>" alt="<?php echo $main_image["alt"]; ?>">
			</div>
		</div>
		</div>
	</section>

	<section id="details" class="section-gray">
		<div class="sizer">
		<?php 
			$benefits_title = get_field('benefits_title');
			$benefits_subtitle = get_field('benefits_subtitle');
			 ?>

			<h2><?php echo $benefits_title; ?></h2>
			<p><?php echo $benefits_subtitle ?></p>

			<div class="grid-three">

				<?php if( have_rows('benefits') ): 
						$num = 1;
					?>
			    	<?php while( have_rows('benefits') ): the_row(); 

			        // Get sub field values.
			        $benefit = get_sub_field('benefits_item');
			        
			        ?>
					
						<div class="benefit-item">
							<p class="number">0<?php echo $num++; ?></p>
							<h3><?php echo $benefit['benefits_title']; ?></h3>
							<p><?php echo $benefit['benefits_content']; ?></p>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>

			</div>
		</div>
	</section>

	<section class="section-red">
		<div class="sizer">

			<?php 
			$features_title = get_field('features_title');
			$features_subtitle = get_field('features_subtitle');
			 ?>

			<h2><?php echo $features_title; ?></h2>
			<p><?php echo $features_subtitle ?></p>

			<div class="grid-three">
				<?php if( have_rows('features') ): ?>
			    	<?php while( have_rows('features') ): the_row(); 

			    	$feature = get_sub_field('feature_item');
			        ?>
						<div class="feature-item">
							<img src="<?php echo esc_url( $feature['feature_icon']['url']); ?>" alt="<?php echo esc_url( $feature['feature_icon']['alt']); ?>">
							<h3><?php echo $feature['feature_title']; ?></h3>
							<p><?php echo $feature['feature_content']; ?></p>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section>
		<div class="sizer">
			<div class="grid-half">
				<div class="call-to-action">
					<h2><?php echo $cta_title; ?></h2>
					<p><?php echo $cta_subtitle; ?></p>

					<a href="<?php echo $main_button_link; ?>" class="n-button n-button-primary"><?php echo $main_button_text; ?></a>
				</div>

				<div>
					<img src="<?php echo $cta_image["url"]; ?>" alt="<?php echo $cta_image["alt"]; ?>">
				</div>
				
			</div>
		</div>
	</section>

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


