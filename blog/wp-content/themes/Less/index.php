<html
<?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php bloginfo('name'); ?> | <?php if( is_home() ) : echo bloginfo( 'description' ); endif; ?><?php wp_title( '', true ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="wp-content/themes/Less/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="http://benpetroski.com/blog/wp-includes/js/konami.js"></script>
<script type="text/javascript">
	var easter_egg = new Konami('http://benpetroski.com/blog/wp-admin/');
</script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>


<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start header
	/*-----------------------------------------------------------------------------------*/
?>

<div class="site-wrapper">

		<div class="site-wrapper-inner">
			<div class="headerAddition">
				<div class="cover-container">

					<div class="mastheadBox clearfix"></div>
					<div class="masthead navbar clearfix">
						<div class="inner">
							<h3 class="masthead-brand">
								<a href="#">BenPetroski.com</a>
							</h3>
							<ul class="nav masthead-nav navbar2">
								<li><a href="http://benpetroski.com">About</a></li>
								<li class="active"><a href="#">Blog</a></li>
								<li><a href="" data-toggle="modal"
									data-target="#contactModal">Contact</a></li>
							</ul>
						</div>
					</div>





					<div id="masthead" class="site-header" role="banner">
						<div class="headed">
							<div class="container headblurb">								
								<li>
									<div class="gravatar">
										<a href="http://bnptr.sk"> <?php $admin_email = get_option('admin_email'); echo get_avatar( $admin_email, 200 ); ?></a>
									</div>
								</li>
								<li>
									<div id="brand">
										<h1 class="site-title">
											<a class="site-title-blog" href="<?php echo esc_url( home_url( '/' ) ); ?>"
												title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
												rel="home">
												<?php bloginfo( 'name' ); ?>
											</a> &mdash; <span>
												<?php echo get_bloginfo( 'description' ); ?>
											</span>
										</h1>
									</div>
								</li>
								<li>
									<div role="navigation" class="site-navigation main-navigation">
										<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
									</div>
								</li>								
							</div>
							<!--/container -->

						</div>
						<!-- #masthead .site-header -->
					</div>




					<div class="container slideDown">
						<div class="mastfoot">
							<div class="inner">
								<a href="#" class="back-to-top">Back to Top</a>
							</div>
						</div>
						<div id="primary">
							<div id="content" role="main">



								<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Home loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_home() || is_archive() ) {
	
?>
								<?php if ( have_posts() ) : ?>

								<?php while ( have_posts() ) : the_post(); ?>

								<article class="post">

									<h1 class="title">
										<a href="<?php the_permalink(); ?>"
											title="<?php the_title(); ?>"> <?php the_title() ?>
										</a>
									</h1>
									<div class="post-meta">
										<?php if( comments_open() ) : ?>
										<span class="comments-link"> <?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); ?>
										</span>
										<?php endif; ?>

									</div>
									<!--/post-meta -->

									<div class="the-content">
										<?php the_content( 'Continue...' ); ?>

										<?php wp_link_pages(); ?>
									</div>
									<!-- the-content -->

									<div class="meta clearfix">
										<div class="category">
											<?php echo get_the_category_list(); ?>
										</div>
										<div class="tags">
											<?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?>
										</div>
									</div>
									<!-- Meta -->

								</article>

								<?php endwhile; ?>

								<!-- pagintation -->
								<div id="pagination" class="clearfix">
									<div class="past-page">
										<?php previous_posts_link( 'Newer &raquo;' ); ?>
									</div>
									<div class="next-page">
										<?php next_posts_link( ' &laquo; Older' ); ?>
									</div>
								</div>
								<!-- pagination -->


								<?php else : ?>

								<article class="post error">
									<h1 class="404">Nothing posted yet</h1>
								</article>

								<?php endif; ?>


								<?php } //end is_home(); ?>

								<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Single loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_single() ) {
?>


								<?php if ( have_posts() ) : ?>

								<?php while ( have_posts() ) : the_post(); ?>

								<article class="post">

									<h1 class="title">
										<?php the_title() ?>
									</h1>
									<div class="post-meta">
										<?php if( comments_open() ) : ?>
										<span class="comments-link"> <?php comments_popup_link( __( 'Comment', 'less' ), __( '1 Comment', 'less' ), __( '% Comments', 'less' ) ); ?>
										</span>
										<?php endif; ?>

									</div>
									<!--/post-meta -->

									<div class="the-content">
										<?php the_content( 'Continue...' ); ?>

										<?php wp_link_pages(); ?>
									</div>
									<!-- the-content -->

									<div class="meta clearfix">
										<div class="category">
											<?php echo get_the_category_list(); ?>
										</div>
										<div class="tags">
											<?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?>
										</div>
									</div>
									<!-- Meta -->

								</article>

								<?php endwhile; ?>

								<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


								<?php else : ?>

								<article class="post error">
									<h1 class="404">Nothing posted yet</h1>
								</article>

								<?php endif; ?>


								<?php } //end is_single(); ?>

								<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Page loop
	/*-----------------------------------------------------------------------------------*/
	
	if( is_page()) {
?>

								<?php if ( have_posts() ) : ?>

								<?php while ( have_posts() ) : the_post(); ?>

								<article class="post">

									<h1 class="title">
										<?php the_title() ?>
									</h1>

									<div class="the-content">
										<?php the_content(); ?>

										<?php wp_link_pages(); ?>
									</div>
									<!-- the-content -->

								</article>

								<?php endwhile; ?>

								<?php else : ?>

								<article class="post error">
									<h1 class="404">Nothing posted yet</h1>
								</article>

								<?php endif; ?>

								<?php } // end is_page(); ?>

							</div>
							<!-- #content .site-content -->
						</div>
						<!-- #primary .content-area -->

					</div>
					<!-- / container-->




				</div>
			</div>
		</div>
	</div>





	<!-- Modal -->
	<div class="modal fade" id="contactModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Job offers, comments, or questions? Email me!</h4>
				</div>

				<form id="contactForm">
					<div class="modal-body">
						<div class="container input-forms">
							<div class="col-lg-12 contact-form">
								<div class="row">
									<div class="form-group">
										<input class="form-control" id="name" name="name"
											placeholder="Name" type="text" required autofocus />
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<input class="form-control" id="email" name="email"
											placeholder="Email" type="email" required />
									</div>
								</div>
								<div class="row">
									<div class="form-group">
										<textarea class="form-control" id="message" name="message"
											placeholder="Message" rows="5" required></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<div class="form-group">
							<a class="pull-left social-media"
								href="https://angel.co/benjamin-petroski"><img
								src="wp-content/themes/Less/images/angelcoIcon.png" height="35px" width="35px"></a> <a
								class="pull-left social-media"
								href="https://github.com/benpetroski"><img
								src="wp-content/themes/Less/images/githubIcon.png" height="35px" width="35px"></a> <a
								class="pull-left social-media"
								href="https://linkedin.com/in/benpetroski"><img
								src="wp-content/themes/Less/images/linkedinIcon.png" height="35px" width="35px"></a>
							<a class="pull-left social-media"
								href="https://twitter.com/62656e"><img
								src="wp-content/themes/Less/images/twitterIcon.png" height="35px" width="35px"></a> <a
								class="pull-left social-media"
								href="mailto:ben@benpetroski.com?Subject=Email%20to%20Ben:%20benpetroski.com"
								target="_top"><img src="wp-content/themes/Less/images/gmailIcon.png" height="35px"
								width="35px"></a>
							<button class="btn btn-danger pull-right" id="cancel"
								type="button" data-dismiss="modal" name="cancel"
								style="margin-right: 5px;">Close</button>
							<button class="btn btn-primary pull-right" id="submit"
								type="submit" name="submit" style="margin-right: 5px;">Submit</button>
						</div>
						<div id='response'></div>
					</div>
				</form>

			</div>
		</div>
	</div>
	<script>
		jQuery(document).ready(function() {
			var offset = 100;
			var duration = 500;
			jQuery(window).scroll(function() {
				if (jQuery(this).scrollTop() > offset) {
					$(this).find('.back-to-top').finish().fadeTo('slow',1);
				} else {
					$(this).find('.back-to-top').finish().fadeTo('slow',0);
				}
			});

			jQuery('.back-to-top').click(function(event) {
				event.preventDefault();
				jQuery('html, body').animate({
					scrollTop : 0
				}, duration);
				return false;
			})
		});
		jQuery(document).scroll(function() {
			var y = $(this).scrollTop();
			if (y > 600) {
				$(this).find('.back-to-top').finish().fadeTo('slow',1);
			} else {
				$(this).find('.back-to-top').finish().fadeTo('slow',0);
			}
		});
	</script>
	<script src="wp-content/themes/Less/bootstrap/js/jquery.min.js"></script>
	<script src="wp-content/themes/Less/bootstrap/js/bootstrap.min.js"></script>
	<script src="wp-content/themes/Less/bootstrap/js/jquery.easing.min.js"></script>
	<script src="wp-content/themes/Less/bootstrap/js/scrolling-nav.js"></script>
</body>
</html>
