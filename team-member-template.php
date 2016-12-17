<?php 
/*
Name (post title)
Photo (featured image)
Position (post meta)
Twitter link (custom post meta)
Facebook link (custom post meta)
Bio (post content)
*/
	get_header();
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();
			$post_meta = get_post_meta($post->ID);
			print_r($post_meta);
			the_title();
			the_post_thumbnail('thumbnail');


		endwhile;
	else : // If no posts exist.
		echo 'Sorry, no Team Members matched your criteria.';
	endif;
	get_footer();

 ?>