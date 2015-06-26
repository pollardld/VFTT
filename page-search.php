<?php 
/*
* Template Name: Search
*/
get_header(); ?>

	<div class="main spread">

		<?php get_template_part( 'content', 'sidebar' ); ?>

		<div class="span8 no-results">

			<h1>Search</h1>

			<section>
				
				<?php get_search_form(); ?>
	
			</section>

		</div>

	</div>

<?php get_footer();