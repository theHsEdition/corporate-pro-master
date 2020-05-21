<!-- // Services Section (Added in ACF) -->
	<?php 
		$services_title = get_field('services_title');
		$services_subtitle = get_field('services_subtitle');
	?>
	<section>
		<div class="sizer">
		<div class="center-text">
			<h3><?php echo $services_title; ?></h3>
			<p><?php echo $services_subtitle; ?></p>
		</div>

		<div class="grid-four four-panel">

			<?php if( have_rows('services_items') ): 
				while( have_rows('services_items') ): the_row(); 

		        // Get sub field values.
		        $img = get_sub_field('img');
		        $title = get_sub_field('title');
		        $link = get_sub_field('link');
		        	?>

			<div class="service-item">
				<a href="<?php echo $link; ?>">
					<img src="<?php echo $img["url"]; ?>" alt="<?php echo $img["alt"]; ?>"></a>
				<h6><?php echo $title; ?></h6>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>

		</div>

		<div class="center-text">
			<p>Our Experts are Ready.</p>
			<a href="/contact/" class="n-button-primary">Chat Now</a>
		</div>
		</div>
	</section>
	