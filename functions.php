<?php 


function shortcode_callback_func_prev_next_post( $atts = array(), $content = '' ) { 
	$atts = shortcode_atts( 
		array( 'id' => 'value', ), 
		$atts, 'shortcode-id' 
	); 

	ob_start(); ?> 
	
	<div id="prev-next-post-container" class="navigation">
		<?php $prevPost = get_previous_post(true);
		if($prevPost) {?>

			<div class="nav-box previous">
				<h3>Previous Post</h3>
				<?php $prevthumbnail = get_the_post_thumbnail($prevPost->ID, array(300,300) );?>
				<?php previous_post_link('%link',"$prevthumbnail  <p>%title</p>", TRUE); ?>
			</div>
		
		<?php } $nextPost = get_next_post(true);
		if($nextPost) { ?>

		<div class="nav-box next" style="float:right;">
			<h3>Next Post</h3>
			<?php $nextthumbnail = get_the_post_thumbnail($nextPost->ID, array(300,300) ); } ?>
			<?php next_post_link('%link',"$nextthumbnail  <p>%title</p>", TRUE); ?>
		</div>

	</div>

	<?php 
	$output = ob_get_contents(); 
	ob_end_clean(); 
	return $output; 
} 
add_shortcode( 'prev_next_post', 'shortcode_callback_func_prev_next_post' );
