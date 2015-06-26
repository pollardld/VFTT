<?php
/*
* Template Name: Text Page
*/
get_header(); ?>

	<div class="main spread">

		<aside class="span4">&nbsp;</aside>

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="span8">
				
				<h1><?php the_title(); ?></h1>

				<section>
					<?php the_content(); ?>
				
				</section>

			</div>

		<?php endwhile; ?>

	</div>

<?php get_footer();