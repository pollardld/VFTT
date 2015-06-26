	<footer>
		
		<section class="container">
			
			<a href="/" class="logo-block-footer">
				<div class="logo">
					<?php include('img/logo.svg'); ?>
				</div>
			</a>

			<nav>
				<ul>
					<li class="menu-item-has-children">
						<a>Point of View</a>
						<ul class="sub-menu">
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-136"><a href="/inspired-by/">Inspired By</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-148"><a href="/obsessing-over/">Obsessing Over</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-147"><a href="/topp-links/">Topp Links</a></li>
							<!-- <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-146"><a href="/topp-posts/">Topp Posts</a></li> -->
						</ul>
					</li>
					<li><a href="/shopp-the-look/">Shopp the Look</a></li>
					<li><a href="/your-view/">Your View</a></li>
					<li><a href="#aboutpage" class="modal-link">About</a></li>
					<li><a href="#presspage" class="modal-link">Press</a></li>
					<li><a href="#friendspage" class="modal-link">Friends</a></li>
					<li><a href="mailto:viewfromthetopp@gmail.com">Contact</a></li>
					<li><a href="/vftt-search/">Search</a></li>
				</ul>

				<div class="social">
					<a href="https://twitter.com/viewfromthetopp" class="icon-fontawesome-webfont" target="_blank"></a>
					<a href="http://viewfromthetopp.com/" class="icon-fontawesome-webfont-1" target="_blank"></a>
					<a href="https://www.facebook.com/viewfromthetopp" class="icon-fontawesome-webfont-3" target="_blank"></a>
					<a href="http://www.pinterest.com/viewfromthetopp/" class="icon-fontawesome-webfont-4" target="_blank"></a>
					<a href="http://instagram.com/viewfromthetopp" class="icon-fontawesome-webfont-2" target="_blank"></a>
				</div>

				<div class="copywrite">
					<span>&copy; <?php echo date("Y"); ?> Kate brien</span>
					site by Hum Creative
					<br />
					<?php wp_nav_menu( array( 
						'theme_location' => 'footer_menu', 
						'menu_class' => '',
						'container' => false
					)); ?>
				</div>
			</nav>

		</section>

	</footer>

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-56270656-1', 'auto');
		  ga('send', 'pageview');
	</script>

<?php wp_footer(); ?>
</body>
</html>