<?php get_header(); ?>

	<div class="main spread">	

		<?php get_template_part( 'content', 'sidebar-your_view' ); ?>

		<section class="span8 infinite" id="social_hashtags">

			<h1>Your View</h1>
			
			<?php 

				global $post;

				$paged = ( get_query_var( 'paged' ) ) ? get_query_var('paged') : 1;
				
				$args = array(
					'post_type' => 'social_hashtag',
					'posts_per_page' => 16,
					'orderby' => 'date',
					'order' => 'DESC',
					'paged' => $paged
				);

				$get_posts = new WP_Query($args);

				if( $get_posts->have_posts() ) : ?>
			
				<?php while( $get_posts->have_posts() ) : $get_posts->the_post(); ?>

					<?php
						$yourview_image = get_post_meta($post->ID, 'social_hashtag_full_url', true);
						$yourview_image_thumb = get_post_meta($post->ID, 'social_hashtag_thumb_url', true);
						$social_hashtag_userhandle = get_post_meta($post->ID, 'social_hashtag_userhandle', true);
						$hash_substring = substr( $social_hashtag_userhandle, 0, 15 );

						if ( $social_hashtag_userhandle != 'viewfromthetopp' ) :
					?>
			
						<div class="span4 instagram-content infinite-item">
							<a class="insta-zoom" href="<?php echo $yourview_image; ?>">
								<img src="<?php echo $yourview_image_thumb; ?>" alt="instagram photo" />
							</a>
							Posted By: 
							<?php if ( $hash_substring ) { ?>
								@<?php echo $hash_substring; ?>
							<?php }; ?>
						</div>

					<?php endif; ?>
					
				<?php endwhile; ?>

				<section class="pagination-container nav-next clear infinite-item">
					<?php next_posts_link( '', $get_posts->max_num_pages ); ?>
				</section>

				<?php wp_reset_postdata(); ?>
			
			<?php else: ?>
				<h4>No Content was found</h4>
			<?php endif; ?>
		</section>

	</div>

<?php get_footer();