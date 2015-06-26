<?php get_header(); ?>

	<div class="main">

		<?php 

			// Get Newest Your View Post
			$yourViewArgs = array(
				'post_type' => 'social_hashtag',
				'posts_per_page' => 1,
				'meta_query' => array(
					array(
						'key' => 'make_sticky',
						'value' => '1',
						'compare' => '=='
					)
				)
			);

			query_posts( $yourViewArgs ); 
			
			while ( have_posts() ) : the_post(); ?>
			
				<div class="span3 instagram-content post-content item underlogo">
					
					<?php $yourview_image = get_post_meta($post->ID, 'social_hashtag_full_url', true); ?>
					<?php $yourview_thumb = get_post_meta($post->ID, 'social_hashtag_thumb_url', true); ?>
			    	
			    	<a href="<?php echo $yourview_image; ?>" class="post-image insta-zoom" target="_blank">
			    		<img src="<?php echo $yourview_thumb; ?>"  alt="your view instagram photo" class="insta-thumb" />
			    	</a>

			    	<?php 
						$social_hashtag_userhandle = get_post_meta($post->ID, 'social_hashtag_userhandle', true);
						$hash_substring = substr( $social_hashtag_userhandle, 0, 15 );
					?>

		    		<div class="post-tags">
		    			<a href="/your-view/"><span class="border-bottom">Your View</span></a>
						<a href="/your-view/"><h3>#viewfromthetopp</h3></a>
						<span class="shoutout">Thanks for the submission<br />@<?php echo $hash_substring; ?> Great outfit!</span>
						<a class="look-link" href="http://instagram.com/" target="_blank">SUBMIT YOUR OWN <?php include('img/arrow.svg'); ?></a>
					</div>

					<a href="<?php echo $yourview_image; ?>" class="zoom"></a>

			    </div>
			
			<?php endwhile;

			wp_reset_query(); ?>

		<?php 
			
			$stickyInspired = array(
				'post_type' => 'inspired_by',
				'posts_per_page' => 1,
				'meta_query' => array(
					array(
						'key' => 'make_sticky',
						'value' => '1',
						'compare' => '=='
					)
				)
			);

			// Get Newest inspiration
			query_posts($stickyInspired); 
			
			while ( have_posts() ) : the_post(); 

				$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$current_url = home_url(add_query_arg(array(),$wp->request)); 
			?>
				
				<!-- span 3 open for topp link and social follow links -->
				<div class="span3 follow-span">

					<article class="inspired-content post-content">

						<?php the_post_thumbnail( 'topp-link-thumb'); ?>

						<div class="post-tags">
							<a href="/inspired-by/"><span class="border-bottom">Inspired By</span></a>
							<h3><?php the_title(); ?></h3>
							<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">SOURCE <?php include('img/arrow.svg'); ?></a>
						</div>

						<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
						<a href="<?php echo $imgUrl; ?>" class="zoom"></a>

					</article>
				
			<?php endwhile;

			wp_reset_query(); ?>

					<!-- Social Follow Links -->
					<section class="follow-links span10 infinite-item">
						<h3>Follow On</h3>
						<a href="http://instagram.com/viewfromthetopp" target="_blank" class="look-link">INSTAGRAM</a>
						<hr />
						<a href="http://www.tumblr.com/follow/viewfromthetopp" target="_blank" class="look-link">TUMBLR</a>
						<hr />
						<a href="http://www.pinterest.com/viewfromthetopp/" target="_blank" class="look-link">PINTEREST</a>
						<hr />
						<a href="https://www.facebook.com/viewfromthetopp" target="_blank" class="look-link">FACEBOOK</a>
						<hr />
						<a href="https://twitter.com/viewfromthetopp" target="_blank" class="look-link">twitter</a>
					</section>
					<!-- End Social Follow Links -->

				</div> <!-- end span3 -->

		<?php
			// Get the sticky shop the look
			
			$stickyArgs = array(
				'post_type' => 'shop_the_look',
				'posts_per_page' => 1,
				'meta_query' => array(
					array(
						'key' => 'make_sticky',
						'value' => '1',
						'compare' => '=='
					)
				)
			);

			query_posts( $stickyArgs );
			
			while ( have_posts() ) : the_post(); 

				$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				$current_url = home_url(add_query_arg(array(),$wp->request));
			?>
				
				<div class="span6 the-look item">
			    	
			    	<article class="post-content">
							
						<?php the_post_thumbnail( 'shopp-the-look-thumb' ); ?>

						<div class="post-tags">
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<span><?php the_terms( $post->ID, 'topp_tags', '', ' ', '' ); ?></span>
						</div>

						<a class="look-link" href="<?php the_permalink(); ?>">SHOPP THE LOOK <?php include('img/arrow.svg'); ?></a>

						<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
						<a href="<?php echo $imgUrl; ?>" class="zoom"></a>

					</article>

				</div>
				
			<?php endwhile;

			wp_reset_query(); ?>

		<span id="topp-posts-target"></span>

		<div class="span9 pull infinite">

			<?php 
				
				while ( have_posts() ) : the_post();

					$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$current_url = home_url(add_query_arg(array(),$wp->request));
			 	?>

				<?php 
					$thePostType = get_post_type( get_the_ID() );
					
					if ( $thePostType == 'shop_the_look') : ?>

						<div class="span8 the-look infinite-item item">
		    	
					    	<article class="post-content">
									
								<?php the_post_thumbnail( 'shopp-the-look-thumb'); ?>

								<div class="post-tags">
									<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									<span><?php the_terms( $post->ID, 'topp_tags', '', ' ', '' ); ?></span>
								</div>

								<a class="look-link" href="<?php the_permalink(); ?>">SHOPP THE LOOK <?php include('img/arrow.svg'); ?></a>

								<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
								<a href="<?php echo $imgUrl; ?>" class="zoom"></a>

							</article>

						</div>

					<?php elseif ( $thePostType == 'inspired_by' ) : ?>

						<div class="span4 infinite-item item">

							<article class="inspired-content post-content">

								<?php the_post_thumbnail( 'medium'); ?>

								<div class="post-tags">
									<a href="/inspired-by/"><span class="border-bottom">Inspired By</span></a>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">SOURCE <?php include('img/arrow.svg'); ?></a>
								</div>

								<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
								<a href="<?php echo $imgUrl; ?>" class="zoom"></a>

							</article>

						</div>

					<?php elseif ( $thePostType == 'obsessing_over' ) : ?>

						<div class="span4 infinite-item item">

							<article class="inspired-content post-content">

								<?php the_post_thumbnail( 'medium'); ?>

								<div class="post-tags">
									<a href="/obsessing-over/"><span class="border-bottom">Obsessing Over</span></a>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">SHOPP <?php include('img/arrow.svg'); ?></a>
								</div>

								<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
								<a href="<?php echo $imgUrl; ?>" class="zoom"></a>

							</article>

						</div>

					<?php else : ?>

						<div class="span4 infinite-item item">

							<article class="post-content">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
							</article>

							<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" class="pinterest-pin" target="_blank"></a>
							<a href="<?php echo $imgUrl; ?>" class="zoom"></a>
							
						</div>

					<?php endif; ?>

				<?php endwhile; ?>

				<?php
					// Ads query
					query_posts("pagename=home");
					while ( have_posts() ) : the_post();

						$ads = get_field( 'advertisements' );

						if ( $ads ) :?>

							<div class="span4 infinite-item item ad-wrapper">

								<?php 
								
								$adCount = 1;

								foreach( $ads as $ad ) :

									$source = get_field( 'source', $ad['id'] ); ?>

										<a href="<?php echo $source; ?>" target="_blank" class="ad-link home-ad ad-<?php echo $adCount; ?>">
											<img src="<?php echo $ad['sizes']['medium'] ?>" />
										</a>
									
								<?php $adCount = $adCount + 1; ?>
							
								<?php endforeach; ?>

							</div>

						<?php endif; ?>

				<?php 
					endwhile;
					wp_reset_query(); ?>

				<section class="pagination-container infinite-item">
					<div class="nav-next"><?php next_posts_link( ' ' ); ?></div>
					<div class="nav-prev"><?php previous_posts_link( ' ' ); ?></div>
				</section>
			
			<?php wp_reset_postdata(); ?>
		</div>

		<div class="span3 topp-links-sidebar">

			<h3><a href="/topp-links/">Topp Links</a></h3>

			<?php 
				// Topp Links sidebar
				query_posts("post_type=topp_links&posts_per_page=6"); 
				$i = 0;
				while ( have_posts() ) : the_post(); ?>
					
					<article class="topp-link-content link<?php echo $i; ?>">
				    	
				    	<a href="<?php the_field('source'); ?>" target="_blank"><?php the_post_thumbnail( 'topp-link-thumb' ); ?></a>

				    	<span class="topp-title-substr"><?php 
				    		$the_topp_title = get_the_title(); 
				    		$the_topp_title_substr = substr( $the_topp_title, 0, 28 ); ?>
				    		<a href="<?php the_field('source'); ?>" target="_blank"><?php echo $the_topp_title_substr; ?></a></span>

				    	<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">
							<?php 
								$term_list = wp_get_post_terms($post->ID, 'topp_links_source', array("fields" => "names"));
								$term = substr( $term_list[0], 0, 14 );
								echo $term;
							?>
							<?php include('img/arrow.svg'); ?>
						</a>

						<hr />

					</article>

				<?php 
					$i++;
					endwhile;

				wp_reset_query(); ?>
		</div>

	</div>

<?php get_footer();