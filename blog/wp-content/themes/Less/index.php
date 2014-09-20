<?php
    // Include WordPress
    define('WP_USE_THEMES', false);
    // Change path below to location of wp-blog-header.php on server
    require('/var/www/html/blog/wp-blog-header.php');
    // Change number below to show 1 or more post excerpts
    query_posts('showposts=3');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="http://getbootstrap.com/favicon.ico">

<title>@62656e</title>

<!-- Bootstrap core CSS -->
<link href="wp-content/themes/Less/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script
	src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
<script
	src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="http://benpetroski.com/blog/wp-includes/js/konami.js"></script>
<script type="text/javascript">
	var easter_egg = new Konami('http://benpetroski.com/blog/wp-admin/');
</script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
<script>
	$(document).ready(
			function() {
				$('#contactForm').submit(
						function() {

							// show that something is loading
							$('#response').html("<b>Loading response...</b>");

							/*
							 * 'post_receiver.php' - where you will pass the form data
							 * $(this).serialize() - to easily read form data
							 * function(data){... - data contains the response from post_receiver.php
							 */
							$.ajax({
								type : 'POST',
								url : 'wp-content/themes/Less/takeform.php',
								data : $(this).serialize()
							}).done(function(data) {

								console.log(data);

								data = data.replace(/\*/g, '');
								data = data.replace(/\//g, '');

								console.log(data);
								// show the response
								$('#response').text(data);

							}).fail(function() {

								// just in case posting your form failed
								alert("Posting failed.");

							});

							// to prevent refreshing the whole page page
							$(':input', '#contactForm').not(
									':button, :submit, :reset, :hidden')
									.val('').removeAttr('checked').removeAttr(
											'selected');
							return false;

						});
				$('#cancel').click(
						function() {
							$(':input', '#contactForm').not(
									':button, :submit, :reset, :hidden')
									.val('').removeAttr('checked').removeAttr(
											'selected');
						});
			});
</script>

<script src="http://d3js.org/d3.v3.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


			<div class="cover-container">

				<div class="mastheadBox clearfix"></div>
				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">
							<a href="#">BenPetroski.com</a>
						</h3>
						<ul class="nav masthead-nav">
							<li><a href="../">About</a></li>
							<li class="active"><a href="#">Blog</a></li>
							<li><a href="" data-toggle="modal"
								data-target="#contactModal">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>


	
	<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start header
	/*-----------------------------------------------------------------------------------*/
?>

<header id="masthead" class="site-header" role="banner">
	<div class="container">
		
		<div class="gravatar">
			<a href="http://bnptr.sk">
			<?php 
				// grab admin email and their photo
				$admin_email = get_option('admin_email');
				echo get_avatar( $admin_email, 100 ); 
			?></a>
		</div><!--/ author -->
		
		<div id="brand">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &mdash; <span><?php echo get_bloginfo( 'description' ); ?></span></h1>
		</div><!-- /brand -->
	
		<nav role="navigation" class="site-navigation main-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- .site-navigation .main-navigation -->
		
		<div class="clear"></div>
	</div><!--/container -->
		
</header><!-- #masthead .site-header -->

<div class="container">

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
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_title() ?>
							</a>
						</h1>
						<div class="post-meta">
							<?php if( comments_open() ) : ?>
								<span class="comments-link">
									<?php comments_popup_link( __( 'Comment', 'break' ), __( '1 Comment', 'break' ), __( '% Comments', 'break' ) ); ?>
								</span>
							<?php endif; ?>
						
						</div><!--/post-meta -->
						
						<div class="the-content">
							<?php the_content( 'Continue...' ); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<div class="category"><?php echo get_the_category_list(); ?></div>
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?></div>
						</div><!-- Meta -->
						
					</article>

				<?php endwhile; ?>
				
				<!-- pagintation -->
				<div id="pagination" class="clearfix">
					<div class="past-page"><?php previous_posts_link( 'Newer &raquo;' ); ?></div>
					<div class="next-page"><?php next_posts_link( ' &laquo; Older' ); ?></div>
				</div><!-- pagination -->


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
					
						<h1 class="title"><?php the_title() ?></h1>
						<div class="post-meta">
							<?php if( comments_open() ) : ?>
								<span class="comments-link">
									<?php comments_popup_link( __( 'Comment', 'less' ), __( '1 Comment', 'less' ), __( '% Comments', 'less' ) ); ?>
								</span>
							<?php endif; ?>
						
						</div><!--/post-meta -->
						
						<div class="the-content">
							<?php the_content( 'Continue...' ); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
						<div class="meta clearfix">
							<div class="category"><?php echo get_the_category_list(); ?></div>
							<div class="tags"><?php echo get_the_tag_list( '| &nbsp;', '&nbsp;' ); ?></div>
						</div><!-- Meta -->						
						
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
					
						<h1 class="title"><?php the_title() ?></h1>
						
						<div class="the-content">
							<?php the_content(); ?>
							
							<?php wp_link_pages(); ?>
						</div><!-- the-content -->
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404">Nothing posted yet</h1>
				</article>

			<?php endif; ?>

	<?php } // end is_page(); ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

</div><!-- / container-->

<?php
	/*-----------------------------------------------------------------------------------*/
	/* Start Footer
	/*-----------------------------------------------------------------------------------*/
?>
	
	


	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4 column">
					<div id="md_widget_twitter-3"
						class="widget widget_md_widget_twitter">
						<h3 class="widget-title">Recent Tweets</h3>
						<a class="twitter-timeline" data-dnt="true"
							href="https://twitter.com/62656e"
							data-widget-id="508503779725959168">Tweets by @62656e</a>
						<script>
							!function(d, s, id) {
								var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/
										.test(d.location) ? 'http' : 'https';
								if (!d.getElementById(id)) {
									js = d.createElement(s);
									js.id = id;
									js.src = p
											+ "://platform.twitter.com/widgets.js";
									fjs.parentNode.insertBefore(js, fjs);
								}
							}(document, "script", "twitter-wjs");
						</script>

					</div>
				</div>

				<div class="col-md-4 column">
					<div id="recent-posts-2" class="widget widget_recent_entries">
						<h3 class="widget-title">Recent Blogs</h3>
						<?php while (have_posts()): the_post(); ?>
						<p>
							<strong><a href="<?php the_permalink(); ?>"
								title="Read full post"> <?php the_title(); ?>
							</a></strong> -
							<?php the_time('jS F') ?>
						</p>
						<?php the_excerpt(); ?>
						<?php endwhile; ?>
					</div>
				</div>

				<div class="col-md-4 column">

					<div id="text-3" class="widget widget_text">
						<h3 class="widget-title">Ben Petroski</h3>
						<div class="textwidget">An engineer at heart with an
							appreciation for well-designed products, Ben spends his free time
							playing sports, tinkering with hardware and software, and trying
							to understand the universe. He generally sticks to things he's
							good at, but tries new things on occasion to explore his
							interests. Additionally, he is constantly listening to music and
							finding adventures, wherever they may be.</div>
						<div class="col-lg-10 col-lg-offset-1 text-center">
							<br>
							<ul class="list-unstyled">
								<li><i class="fa fa-envelope-o fa-fw"></i> 50 Dudley Lane<br>Stanford,
									CA 94305<br> <a href="mailto:ben@benpetroski.com">ben@benpetroski.com</a></li>
							</ul>
							<br>
							<ul class="list-inline">

								<li><a class="pull-left social-media"
									href="https://angel.co/benjamin-petroski"><img
										src="wp-content/themes/Less/images/angelcoIcon.png" height="35px" width="35px"></a>
								</li>
								<li><a class="pull-left social-media"
									href="https://github.com/benpetroski"><img
										src="wp-content/themes/Less/images/githubIcon.png" height="35px" width="35px"></a></li>
								<li><a class="pull-left social-media"
									href="https://linkedin.com/in/benpetroski"><img
										src="wp-content/themes/Less/images/linkedinIcon.png" height="35px" width="35px"></a>
								</li>
								<li><a class="pull-left social-media"
									href="https://twitter.com/62656e"><img
										src="wp-content/themes/Less/images/twitterIcon.png" height="35px" width="35px"></a>
								</li>
								<li><a class="pull-left social-media"
									href="mailto:ben@benpetroski.com?Subject=Email%20to%20Ben:%20benpetroski.com"
									target="_top"><img src="wp-content/themes/Less/images/gmailIcon.png" height="35px"
										width="35px"></a></li>
							</ul>
							<hr class="small">
							<p class="text-muted">Copyright &copy; Ben Petroski 2014</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>




	<!-- Modal -->
	<div class="modal fade" id="contactModal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Job offers,
						comments, or questions? Email me!</h4>
				</div>

				<form id="contactForm">
					<div class="modal-body">
						<div class="container">
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

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script>
		jQuery(document).ready(function() {
			var offset = 220;
			var duration = 500;
			jQuery(window).scroll(function() {
				if (jQuery(this).scrollTop() > offset) {
					jQuery('.back-to-top').fadeIn(duration);
				} else {
					jQuery('.back-to-top').fadeOut(duration);
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
		$(document).scroll(function() {
			var y = $(this).scrollTop();
			if (y > 600) {
				$('.back-to-top').fadeIn();
			} else {
				$('.back-to-top').fadeOut();
			}
		});
	</script>
	<script src="wp-content/themes/Less/bootstrap/js/jquery.min.js"></script>
	<script src="wp-content/themes/Less/bootstrap/js/bootstrap.min.js"></script>
	<script src="wp-content/themes/Less/bootstrap/js/jquery.easing.min.js"></script>
	<script src="wp-content/themes/Less/bootstrap/js/scrolling-nav.js"></script>
</body>
</html>
