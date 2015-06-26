<?php 
/*
* Template Name: Shop The Look
*/
get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-shop_the_look' ); ?>

		<?php 

			if ( have_posts() ) : ?>

				<div class="span8">
					
					<h1><?php the_title(); ?></h1>
				
					<?php while ( have_posts() ) : the_post(); ?>

						<article>
							
							<div class="single-thumb">
								<?php the_post_thumbnail( 'shopp-the-look-thumb' ); ?>
							</div>

							<div class="the-post-content">
								<?php the_content(); ?>
							</div>

						</article>

						<?php 

						$similarItems = get_field( 'shop_similar_objects_selection' );

						if ( $similarItems ) : ?>

							<section class="shop-similar">

								<h2>Shopp Similar Items</h2>

								<?php foreach( $similarItems as $post): ?>

									<?php setup_postdata($post); ?>

								    	<section class="similar-item">

								    		<article class="item">

												<div class="similar-image">
													<a href="<?php the_field('source'); ?>" target="_blank"><?php the_post_thumbnail( 'similar-thumb' ); ?></a>
												</div>

												<div class="post-tags">
													<a href="<?php the_field('source'); ?>" class="look-link" target="_blank">SHOPP</a>
												</div>

											</article>

											<h5><?php the_title(); ?></h5>

											<p><?php the_field('similar_item_description') ?></p>

										</section>

								    <?php endforeach;
							    
								    wp_reset_postdata();
									
								endif; ?>

							</section>

						<section class="comments">

							<h4><a href="#disqus-target">Add A Comment</a> <a href="<?php the_permalink(); ?>#disqus_thread"></a></h4>

							<div class="social">
								<?php
									$jsps_networks = array( 'facebook', 'twitter' );
									juiz_sps( $jsps_networks );

									$imgUrl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
									$current_url = home_url(add_query_arg(array(),$wp->request));
								?>

								<div class="juiz_sps_links  counters_both juiz_sps_displayed_nowhere">
									<ul class="juiz_sps_links_list">
										<li class="juiz_sps_item juiz_sps_link_pinterest">
											<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php echo str_replace(' ', '%20', the_title('', '', false)); ?>%20%007C%20View%20From%20the%20Topp" target="_blank">
												<span class="juiz_sps_icon"></span>
												<span class="juiz_sps_network_name">Pinterest</span>
											</a>
										</li>
									</ul>
								</div>

							</div>

						</section>

						<section class="tags">

							<h4>Tags</h4>
							<span>
								<?php the_terms( $post->ID, 'topp_tags', '', ' ', '' ); ?>
							</span>

						</section>

						<section class="pagination">

							<div class="prev-post-link"><?php previous_post_link( '%link', '<span>&lt;</span> PREV LOOK' ); ?>&nbsp;</div>
							<div class="next-post-link">&nbsp;<?php next_post_link( '%link', 'NEXT LOOK <span>&gt;</span>' ); ?></div>

						</section>

						<section class="related-posts">

							<h4>You May Also Like</h4>

							<?php 
																  							  		
						  		$tagArgs = array(  
						  			'post_type' => 'shop_the_look',
							    	'post__not_in' => array( $post->ID ),
							    	'posts_per_page' => 5
							    ); 

							    $relatedQuery = new WP_query( $tagArgs );  

							    while( $relatedQuery->have_posts() ) : $relatedQuery->the_post();  ?>

							    	<div class="related-posts-content">

							    		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							    			<?php the_post_thumbnail( 'related-thumb' ) ?>
							    		</a>
							    	
							    	</div>

							    <?php endwhile;
							    
							    wp_reset_query();
								
							?>

						</section>

						<span class="target-fix" id="disqus-target"></span>
						<section id="disqus">
							
							<div class="disqus-comments">
								<?php comments_template(); ?>
							</div>
						
						</section>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>

	</div>

<?php get_footer();