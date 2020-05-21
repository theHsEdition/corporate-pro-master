<section class="section-red">
		<div class="sizer">

			<?php 
			$features_title = get_field('features_title');
			$features_subtitle = get_field('features_subtitle');
			 ?>

			<h2><?php echo $features_title; ?></h2>
			<p><?php echo $features_subtitle ?></p>

			<div class="grid-three feature-grid">
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