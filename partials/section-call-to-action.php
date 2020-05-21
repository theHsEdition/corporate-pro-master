<!-- // Call to Action Section (Added in ACF) -->
	<?php 
		$cta_title = get_field('cta_title');
		$cta_subtitle = get_field('cta_subtitle');
		$cta_image = get_field('cta_image'); 

		$main_button_text = get_field('main_button_text'); 
		$main_button_link = get_field('cmain_button_link'); 
	?>
	
	<section>
		<div class="sizer">
			<div class="grid-half">
				<div class="two-third-image">
					<img src="<?php echo $cta_image["url"]; ?>" alt="<?php echo $cta_image["alt"]; ?>">
				</div>
				<div class="call-to-action">
					<h2><?php echo $cta_title; ?></h2>
					<p><?php echo $cta_subtitle; ?></p>

					<a href="<?php echo $main_button_link; ?>" class="n-button n-button-primary"><?php echo $main_button_text; ?></a>
				</div>

			</div>
		</div>
	</section>