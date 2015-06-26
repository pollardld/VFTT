<?php 
	$aboutPost = 268;
	$aboutPostContent = get_post($aboutPost);

	echo get_the_post_thumbnail( $aboutPost, 'large' ); ?>

	<h1><?php echo get_post_meta( $aboutPost, 'name', true ); ?></h1>

	<div class="modal-content">
		<?php echo $aboutPostContent->post_content; ?>
	</div>

	<hr />

	<p><a href="http://<?php echo get_post_meta( $aboutPost, 'website', true ); ?>" target="_blank"><?php echo get_post_meta( $aboutPost, 'website', true ); ?></a></p>
	<p><a href="mailto:<?php echo get_post_meta( $aboutPost, 'email', true ); ?>"><?php echo get_post_meta( $aboutPost, 'email', true ); ?></a></p>
	<p>
		<a href="<?php echo get_post_meta( $aboutPost, 'twitter', true ); ?>" target="_blank" class="icon-fontawesome-webfont icon"></a>
		<a href="<?php echo get_post_meta( $aboutPost, 'pinterest', true ); ?>" target="_blank" class="icon-fontawesome-webfont-4 icon"></a>
		<a href="<?php echo get_post_meta( $aboutPost, 'facebook', true ); ?>" target="_blank" class="icon-fontawesome-webfont-3 icon"></a>
		<a href="<?php echo get_post_meta( $aboutPost, 'instagram', true ); ?>" target="_blank" class="icon-fontawesome-webfont-2 icon"></a>
		<a href="<?php echo get_post_meta( $aboutPost, 'tumblr', true ); ?>" target="_blank" class="icon-fontawesome-webfont-1 icon"></a>
	</p>

	<a href="mailto:viewfromthetopp@gmail.com" class="look-link">VIEWFROMTHETOPP@GMAIL.COM</a>