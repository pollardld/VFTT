<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	
	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="description" content="A Fashion Blog From A Different Perspective">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/app-icons/favicon.ico" type="image/x-icon" />
	<!-- Apple Touch Icons -->
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/app-icons/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/img/app-icons/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/img/app-icons/apple-touch-icon-144x144.png" />
	<!-- Windows 8 Tile Icons -->
	<meta name="msapplication-square150x150logo" content="<?php echo get_stylesheet_directory_uri(); ?>/img/app-icons/mediumtile.png" />
	<meta name="msapplication-wide310x150logo" content="<?php echo get_stylesheet_directory_uri(); ?>/img/app-icons/widetile.png" />
	<meta name="msapplication-square310x310logo" content="<?php echo get_stylesheet_directory_uri(); ?>/img/app-icons/largetile.png" />
	
	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="header-bg">

		<header>

			<button class="navicon">|||</button>

			<nav class="topnav">
				<?php wp_nav_menu( array( 
					'theme_location' => 'primary', 
					'menu_class' => '',
					'container' => false
				)); ?>
			</nav>

			<nav class="sidenav">
				<ul>
					<li><a href="#aboutpage" id="aboutlink" class="modal-link">About</a></li>
					<li><a href="#presspage" id="presslink" class="modal-link">Press</a></li>
					<li><a href="#friendspage" id="friendslink" class="modal-link">Friends</a></li>
				</ul>
			</nav>

			<?php get_search_form(); ?>

			<a href="/" class="logo-block">
				<div class="logo">
					<?php include('img/logo.svg'); ?>
				</div>
			</a>

		</header>

	</div>

	<div class="window-overlay">

		<div class="window-bg"></div>
				
		<div class="modal span10">

			<a href="#" class="close-modal" title="close modal">&nbsp;</a>

			<span id="aboutpage" class="target-fix"></span>
			<article class="modal-page about-page">
				
				<?php get_template_part( 'content', 'about' ); ?>

			</article>

			<span id="presspage" class="target-fix"></span>
			<article class="modal-page press-page">
				
				<?php get_template_part( 'content', 'press' ); ?>

			</article>

			<span id="friendspage" class="target-fix"></span>
			<article class="modal-page friends-page">
				
				<?php get_template_part( 'content', 'friends' ); ?>
				
			</article>

		</div>

	</div>