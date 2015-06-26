<?php 
/*
* Template Name: Topp Posts
*/
get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar' ); ?>

		<?php 

			if ( have_posts() ) : ?>

				<div class="span8">

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="topp-post-content">

							<h1><?php the_title(); ?></h1>

							<?php if ( has_post_thumbnail() ) { ?>

								<div class="topp-post-image">
									<?php the_post_thumbnail( 'topp-link-post' ); ?>
								</div>
							
							<?php }; ?>

							<div class="topp-post-the_content">
								
								<?php the_content(); ?>

								<?php 
									$pullQuote = get_field( 'pull_quote' );
									
									if ( $pullQuote ) : ?>
									
										<blockquote class="pull-quote">
											<?php echo $pullQuote; ?>
										</blockquote>

									<?php endif; ?>

							</div>

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
												<a href="http://www.pinterest.com/pin/create/button/?url=<?php echo $current_url; ?>&amp;media=<?php echo $imgUrl; ?>&amp;description=<?php the_title(); ?> | View From the Topp" target="_blank">
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
								<span><?php the_tags( '&nbsp;', ', ', '' ); ?></span>

							</section>

							<section class="disqus-comments" id="disqus">
								<?php comments_template(); ?>
							</section>

						</div>

					<?php endwhile;

					// Pagination Here
					wp_reset_postdata(); ?>
				
				</div>

			<?php endif; ?>

	</div>

<?php get_footer();
