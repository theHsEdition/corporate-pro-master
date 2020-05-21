<!-- // Main Section (Added in ACF) CONDITIONAL -->
	<?php 
		$highlight_title = get_field('highlight_title');
		$highlight_content = get_field('highlight_content');
		$highlight_image = get_field('highlight_image');
	?>
	<section id="highlight-section">
		<div class="sizer">
		<div class="grid-half">
			<div>
				<h2><?php echo $highlight_title; ?></h2>
				<p><?php echo $highlight_content; ?></p>
			</div>

			<div class="two-third-image">
				<img src="<?php echo $highlight_image["url"]; ?>" alt="<?php echo $highlight_image["alt"]; ?>">
			</div>
		</div>
		</div>
	</section>