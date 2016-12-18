<?php 

	get_header();
	if ( have_posts() ) :
		echo '<div id=\'team\'>';
		while ( have_posts() ) : the_post();
			echo '<div class=\'member\'>';
			$post_meta = get_post_meta($post->ID);
			the_post_thumbnail('thumbnail');
			?>
			<h2 class='name'> <?php   the_title(); ?></h2>
			<span class='position'><?php  echo $post_meta['_DB_staffposition'][0]; ?> </span>
			<a href='<?php echo $post_meta['_DB_stafffacebook_url'][0]; ?>' target='_blank'>
			<img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAS1BMVEUAAAAsbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd0sbd3q/KZNAAAAGHRSTlMAAwQLDg8TISQ4VmJkdZqo0dPX4Obz+ftchJvYAAAAU0lEQVQYlcXNuxJAMBRF0RuvuATx3v//pRpMYlIYjd2d1RyRM9P6bZ2MhGUjAFmEjgR6mOuyiEx2cPIMaF4gV0sKhxR2Aaoq0KtWn95/R2ttfo8DCNUIykx8A1UAAAAASUVORK5CYII='>
			</a>
			<a href='<?php echo $post_meta['_DB_stafftwitter_url'][0]; ?>'>
			<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAMAAAC6V+0/AAAAq1BMVEUAAAAsst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst0sst10n3wPAAAAOHRSTlMAAQIDBAUKDBAVHB4hKy0uOkFCQ0VGSk1PVFVZXWNkZoKSlZeYmpujrbW3vsPO0dfc3uDo7fX7/fqSCz0AAACNSURBVBgZncHZAoFAAAXQO1GRLUv2LWsRyXr//8tMM0SPnIO/CG+zagoUDcDxoBl7SqG/BjBgH8qMymVYBXpkYENKqI0BlCht65a4UjlDMkbMiSB1jnd+8yFZD+Z0kXKZYyMl3BM/Amghv5ShmTtmJsg4MbUl3gqNiNpcQBGtmC+HGjJmexHfknBawe+eUnMmRdtDuZoAAAAASUVORK5CYII=" alt="twitter icon">
			</a>
			<button class='readmore'> READ MORE </button>
			<div class='description'>
				<?php the_content(); ?>
			<button class='readless'> READ LESS </button>

			</div>
			<?php
			
			
			
			echo '</div>';

		endwhile;
		echo '</div>';
	else : // If no posts exist.
		echo 'Sorry, no Team Members matched your criteria.';
	endif;
	get_footer();

 ?>