<?php get_header(); ?>

	<div class="main spread">

		<?php 
			if ( have_posts() ) :

				get_template_part( 'content', 'sidebar' ); ?>

				<div class="span8">
				
					<?php 

						while ( have_posts() ) : the_post(); ?>

						<?php 
							$thePostType = get_post_type( get_the_ID() );
							
							if ( $thePostType == 'shop_the_look') : ?>

								<div class="span8 the-look">
				    	
							    	<article class="post-content">
											
										<?php the_post_thumbnail( 'featured-image'); ?>

										<div class="post-tags">
											<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
											<span><?php the_terms( $post->ID, 'topp_tags', '', ' ', '' ); ?></span>
										</div>

										<a class="look-link" href="<?php the_permalink(); ?>">SHOPP THE LOOK <?php include('img/arrow.svg'); ?></a>

									</article>

								</div>

							<?php elseif ( $thePostType == 'inspired_by' ) : ?>

								<div class="span4">

									<article class="inspired-content post-content">

										<?php the_post_thumbnail( 'featured-image'); ?>

										<div class="post-tags">
											<span>Inspired By</span>
											<hr />
											<a href="<?php the_field('source'); ?>"><h3><?php the_title(); ?></h3></a>
											<a href="<?php the_field('source'); ?>" class="look-link">SOURCE <?php include('img/arrow.svg'); ?></a>
										</div>

									</article>

								</div>

							<?php elseif ( $thePostType == 'obsessing_over' ) : ?>

								<div class="span4">

									<article class="inspired-content post-content">

										<?php the_post_thumbnail( 'featured-image'); ?>

										<div class="post-tags">
											<span>Obsessing Over</span>
											<hr />
											<h3><?php the_terms( $post->ID, 'brands', '', ' ', '' ); ?></h3>
											<h5><?php the_title(); ?></h5>
											<a href="<?php the_field('source'); ?>" class="look-link">SHOPP <?php include('img/arrow.svg'); ?></a>
										</div>

									</article>

								</div>

							<?php elseif ( $thePostType == 'topp_links' ) : ?>

								<div class="span4">

									<article>
										<a href="<?php the_field('source'); ?>"><?php the_post_thumbnail( 'topp-link-thumb' ); ?></a>
									</article>

								</div>

							<?php else : ?>

								<div class="span6">

									<article>
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
											<?php the_title(); ?>
										</a>
									</article>
									
								</div>

							<?php endif; ?>

					<?php endwhile; ?>

				</div>

			<?php endif; ?>

	</div>

<?php get_footer();