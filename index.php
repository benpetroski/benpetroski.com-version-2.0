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
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="index.css" rel="stylesheet">
<script
	src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
<script
	src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<script type="text/javascript" src="bootstrap/js/konami.js"></script>
<script type="text/javascript">
	konami = new Konami(function() {
		$(document).ready(function() {
			$("#ee").modal();
		});
	});
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
								url : 'takeform.php',
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

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script>
	var map;
	var center = new google.maps.LatLng(37.584404, -122.252438);
	var stanford = new google.maps.LatLng(37.426789, -122.159416);
	var MY_MAPTYPE_ID = 'custom_style';

	function initialize() {

		var featureOpts = [ {
			"stylers" : [ {
				"hue" : "#ff1a00"
			}, {
				"invert_lightness" : true
			}, {
				"saturation" : -100
			}, {
				"lightness" : 33
			}, {
				"gamma" : 0.5
			} ]
		}, {
			"featureType" : "water",
			"elementType" : "geometry",
			"stylers" : [ {
				"color" : "#2D333C"
			} ]
		} ]

		var mapOptions = {
			zoom : 10,
			scrollwheel : false,
			center : center,
			mapTypeControlOptions : {
				mapTypeIds : [ google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID ]
			},
			mapTypeId : MY_MAPTYPE_ID
		};

		map = new google.maps.Map(document.getElementById('map-canvas'),
				mapOptions);

		var styledMapOptions = {
			name : 'Custom Style'
		};

		var customMapType = new google.maps.StyledMapType(featureOpts,
				styledMapOptions);

		map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

		var marker = new google.maps.Marker({
			position : stanford,
			map : map,
			title : 'Hello World!'
		});
		marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png')
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>

<body>

	<div class="site-wrapper">

		<div class="site-wrapper-inner">

			<div class="cover-container">
				
				<div class="mastheadBox clearfix"></div>
				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">
							<a href="#">BenPetroski.com</a>
						</h3>
						<ul class="nav masthead-nav">
							<li class="active"><a href="index.html">About</a></li>
							<li><a href="..\blog\">Blog</a></li>
							<li><a href="" data-toggle="modal"
								data-target="#contactModal">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>


			<div class="inner cover">			
				<h1 class="cover-heading">Hi. I'm Ben.</h1>
				<p class="lead">I like startups and tech.</p>
				<p class="lead">
					<a href="#about" class="btn btn-lg btn-success page-scroll">Learn
						more</a>
				</p>
			</div>

			<div class="mastfoot">
				<div class="inner">
					<a href="#" class="back-to-top">Back to Top</a>
				</div>
			</div>
		</div>
	</div>


	<!-- About Section -->
	<section id="about" class="about-section">
		<!-- Carousel
	    ================================================== -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active">
					<img
						src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="First slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>Example headline.</h1>
							<p>
								Note: If you're viewing this page via a
								<code>file://</code>
								URL, the "next" and "previous" Glyphicon buttons on the left and
								right might not load/display properly due to web browser
								security rules.
							</p>
							<p>
								<a class="btn btn-lg btn-primary" href="#" role="button">Sign
									up today</a>
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<img
						src="data:image/gif;base64,R0lGODlhAQABAIAAAGZmZgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="Second slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>Another example headline.</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget
								quam. Donec id elit non mi porta gravida at eget metus. Nullam
								id dolor id nibh ultricies vehicula ut id elit.</p>
							<p>
								<a class="btn btn-lg btn-primary" href="#" role="button">Learn
									more</a>
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<img
						src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="Third slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>One more for good measure.</h1>
							<p>Cras justo odio, dapibus ac facilisis in, egestas eget
								quam. Donec id elit non mi porta gravida at eget metus. Nullam
								id dolor id nibh ultricies vehicula ut id elit.</p>
							<p>
								<a class="btn btn-lg btn-primary" href="#" role="button">Browse
									gallery</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<a class="left carousel-control" href="#myCarousel" role="button"
				data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#myCarousel" role="button"
				data-slide="next"><span
				class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		<!-- /.carousel -->



		<!-- Marketing messaging and featurettes
	    ================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->

		<div class="container marketing">

			<!-- Three columns of text below the carousel -->
			<div class="row">
				<div class="col-lg-4">
					<img class="img-circle"
						src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="Generic placeholder image"
						style="width: 140px; height: 140px;">
					<h2>I know a bit about a byte of things.</h2>
					<p>Like a lot of things. And if I don't, then I'm probably
						trying to learn it or it's on my to do list. (Which is pretty
						long...)</p>
					<p>
						<a class="btn btn-default" href="#" role="button">View details
							&raquo;</a>
					</p>
				</div>
				<!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<img class="img-circle"
						src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="Generic placeholder image"
						style="width: 140px; height: 140px;">
					<h2>Heading</h2>
					<p>Duis mollis, est non commodo luctus, nisi erat porttitor
						ligula, eget lacinia odio sem nec elit. Cras mattis consectetur
						purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo,
						tortor mauris condimentum nibh.</p>
					<p>
						<a class="btn btn-default" href="#" role="button">View details
							&raquo;</a>
					</p>
				</div>
				<!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<img class="img-circle"
						src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="Generic placeholder image"
						style="width: 140px; height: 140px;">
					<h2>Heading</h2>
					<p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis
						in, egestas eget quam. Vestibulum id ligula porta felis euismod
						semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris
						condimentum nibh, ut fermentum massa justo sit amet risus.</p>
					<p>
						<a class="btn btn-default" href="#" role="button">View details
							&raquo;</a>
					</p>
				</div>
				<!-- /.col-lg-4 -->
			</div>
			<!-- /.row -->


			<!-- START THE FEATURETTES -->


			<div class="row featurette" id="featuretteA">
				<div class="col-md-7">
					<h2 class="featurette-heading">
						First featurette heading. <span class="text-muted">It'll
							blow your mind.</span>
					</h2>
					<p class="lead">Donec ullamcorper nulla non metus auctor
						fringilla. Vestibulum id ligula porta felis euismod semper.
						Praesent commodo cursus magna, vel scelerisque nisl consectetur.
						Fusce dapibus, tellus ac cursus commodo.</p>
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-responsive"
						src="http://placehold.it/400x400" alt="Generic placeholder image">
				</div>
			</div>


			<div class="row featurette" id="featuretteB">
				<div class="col-md-5">
					<img class="featurette-image img-responsive"
						src="http://placehold.it/400x400" alt="Generic placeholder image">
				</div>
				<div class="col-md-7">
					<h2 class="featurette-heading">
						Oh yeah, it's that good. <span class="text-muted">See for
							yourself.</span>
					</h2>
					<p class="lead">Donec ullamcorper nulla non metus auctor
						fringilla. Vestibulum id ligula porta felis euismod semper.
						Praesent commodo cursus magna, vel scelerisque nisl consectetur.
						Fusce dapibus, tellus ac cursus commodo.</p>
				</div>
			</div>


			<div class="row featurette" id="featuretteC">
				<div class="col-md-7">
					<h2 class="featurette-heading">
						And lastly, this one. <span class="text-muted">Checkmate.</span>
					</h2>
					<p class="lead">Donec ullamcorper nulla non metus auctor
						fringilla. Vestibulum id ligula porta felis euismod semper.
						Praesent commodo cursus magna, vel scelerisque nisl consectetur.
						Fusce dapibus, tellus ac cursus commodo.</p>
				</div>
				<div class="col-md-5">
					<img class="featurette-image img-responsive"
						src="http://placehold.it/400x400" alt="Generic placeholder image">
				</div>
			</div>


			<!-- /END THE FEATURETTES -->

		</div>
		<!-- /.container -->
	</section>

	<div id="map-canvas"></div>


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
										src="images/angelcoIcon.png" height="35px" width="35px"></a>
								</li>
								<li><a class="pull-left social-media"
									href="https://github.com/benpetroski"><img
										src="images/githubIcon.png" height="35px" width="35px"></a></li>
								<li><a class="pull-left social-media"
									href="https://linkedin.com/in/benpetroski"><img
										src="images/linkedinIcon.png" height="35px" width="35px"></a>
								</li>
								<li><a class="pull-left social-media"
									href="https://twitter.com/62656e"><img
										src="images/twitterIcon.png" height="35px" width="35px"></a>
								</li>
								<li><a class="pull-left social-media"
									href="mailto:ben@benpetroski.com?Subject=Email%20to%20Ben:%20benpetroski.com"
									target="_top"><img src="images/gmailIcon.png" height="35px"
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
	<div class="modal fade" id="ee" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Menu</h4>
				</div>

				<div class="modal-body">
					<div class="container">
						<div class="col-lg-12 contact-form">
							<div class="row">
								<div class="form-group">
									<a class="btn btn-primary" href="#">Button 1</a> <a
										class="btn btn-primary" href="#">Button 2</a> <a
										class="btn btn-primary" href="#">Button 3</a>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<a class="btn btn-primary" href="#">Button 4</a> <a
										class="btn btn-primary" href="#">Button 5</a> <a
										class="btn btn-primary" href="#">Button 6</a>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<a class="btn btn-primary" href="#">Button 7</a> <a
										class="btn btn-primary" href="#">Button 8</a> <a
										class="btn btn-primary" href="#">Button 9</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<div class="form-group">
						<button class="btn btn-primary pull-right" data-dismiss="modal">Close</button>
					</div>
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
								src="images/angelcoIcon.png" height="35px" width="35px"></a> <a
								class="pull-left social-media"
								href="https://github.com/benpetroski"><img
								src="images/githubIcon.png" height="35px" width="35px"></a> <a
								class="pull-left social-media"
								href="https://linkedin.com/in/benpetroski"><img
								src="images/linkedinIcon.png" height="35px" width="35px"></a>
							<a class="pull-left social-media"
								href="https://twitter.com/62656e"><img
								src="images/twitterIcon.png" height="35px" width="35px"></a> <a
								class="pull-left social-media"
								href="mailto:ben@benpetroski.com?Subject=Email%20to%20Ben:%20benpetroski.com"
								target="_top"><img src="images/gmailIcon.png" height="35px"
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
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.easing.min.js"></script>
	<script src="bootstrap/js/scrolling-nav.js"></script>
</body>
</html>