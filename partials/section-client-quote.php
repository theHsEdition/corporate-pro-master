<!-- // Client Quote Section (Added in ACF) -->
	<?php 
		$quote = get_field('quote');
		$quote_client = get_field('quote_client');
		$quote_company = get_field('quote_company');
	?>

	<div class="">
		<section class="section-quote section-red">
			<div class="quote"><?php echo $quote; ?></div>
			<p><strong><?php echo $quote_client ?></strong></p>
			<p><?php echo $quote_company ?></p>
		</section>
	</div>
	