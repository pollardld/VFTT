<?php get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar' ); ?>

		<?php 

			$args = array(
				'post_type' => 'press',
				'posts_per_page' => 6
			);

			$the_query = new WP_Query( $args );

			if ( $the_query->have_posts() ) : ?>

				<div class="span8">

					<h1>Press</h1>
				
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					
						<div class="span6 press-post">

							<article class="post-content">
							
								<?php the_post_thumbnail(); ?>
							
								<p><?php the_title();?></p>
						    
						    	<a href="<?php the_field('source'); ?>" title="<?php the_title();?>" class="look-link" target="_blank">VIEW POST <?php include('img/arrow.svg'); ?></a>
						    
						    </article>

					    </div>

					<?php endwhile; ?>
						
				</div>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

	</div>

<?php get_footer();