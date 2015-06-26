<?php 
/*
* Template Name: Topp Posts
*/
get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar-topp_posts' ); ?>

		<?php 
			$args = array(
				'post_type' => 'post',
			   	'posts_per_page' => 1
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>

				<div class="span8">

					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<div class="topp-post-content">

							<h1><?php the_title(); ?></h1>

							<?php if ( has_post_thumbnail() ) { ?>

								<div class="topp-post-image">
									<?php the_post_thumbnail( 'topp-link-post' ); ?>
								</div>
							
							<?php }; ?>

							<div class="topp-post-the_content">

								<?php the_content(); ?>

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
								<span><?php the_tags( '&nbsp;', ', ', '' ); ?></span>

							</section>

							<span class="target-fix" id="disqus-target"></span>
							<section id="disqus">
								
								<div class="disqus-comments">
									<?php comments_template(); ?>
								</div>
							
							</section>

						</div>

					<?php endwhile;

					// Pagination Here
					wp_reset_postdata(); ?>
				
				</div>

			<?php endif; ?>

	</div>

	    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'vftt'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>

<?php get_footer();
