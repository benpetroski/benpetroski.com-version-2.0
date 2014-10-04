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
<script src="http://d3js.org/d3.v3.min.js"></script>
</head>

<body>	
	<div class="site-wrapper">

		<div class="site-wrapper-inner">
			<div class="cover-container">

				<div class="mastheadBox clearfix"></div>
				<div class="masthead navbar clearfix">
					<div class="inner">
						<h3 class="masthead-brand">
							<a href="#">BenPetroski.com</a>
						</h3>
						<ul class="nav masthead-nav">
							<li class="active"><a href="index.html">About</a></li>
							<li><a href="../blog/">Blog</a></li>
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
		<!-- Marketing messaging and featurettes
	    ================================================== -->
		<!-- Wrap the rest of the page in another container to center all the content. -->



		<!-- Carousel
	    ================================================== -->
		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="8000" data-pause="none">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
			<div class="item active">
					<img
						src="data:image/gif;base64,R0lGODlhAQABAIAAAGZmZgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="First slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>I am currently fiddling with hardware.</h1>
							<p>I have done a lot of software projects and test-based internships in the past, but my current focus is on exploring design principles.</p> 
							<p>	<a class="btn btn-lg btn-primary" href="http://benpetroski.com/blog/" role="button">Check out my blog</a>
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<img
						src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
						alt="Second slide">
					<div class="container">
						<div class="carousel-caption">
							<h1>I know a bit about a byte of things.</h1>
							<p>Like at least several gigabytes. And if I don't, then it is either on my to do list (which is pretty
							long) or I am already trying to learn it.</p>
							<p>
								<a class="btn btn-lg btn-primary" href="http://benpetroski.com/blog/?page_id=2" role="button">See some things I have done</a>
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
							<h1>Want to know more? Contact me!</h1>
							<p>Best way to get in touch is by email. I check my inbox way too often, which is possibly a good thing. At least I am not entirely procrastinating.</p>
							<p>
								<a class="btn btn-lg btn-primary" href="" data-toggle="modal"
								data-target="#contactModal" role="button">Send me a message</a>
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

		<div class="container marketing">
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
						src="/images/oregonCoast.jpg"
						alt="Generic placeholder image"
						style="width:544px; height:408px;">
				</div>
			</div>


			<div class="row featurette" id="featuretteB">
				<div class="col-md-5">
					<img class="featurette-image img-responsive"
						src="/images/napaValley.jpg" 
						alt="Generic placeholder image"
						style="width:544px; height:408px;">
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
						I hack like it's my job. <br/><span class="text-muted">Unfortunately, it's not [yet].</span>
					</h2>
					<p class="lead">I have learned a lot over the past
					several years, both inside and outside the classroom. 
					The culmination of which has taught me that there is 
					always more to learn, but I'm cool with that; I like learning.
					Here is my <a href="http://bnptr.sk/1rFrwBB"><strong>resume</strong></a>.</p>
				</div>
				<div class="col-md-5">
					<div id="skills" class="featurette-image img-responsive">
						<ul class="skill">
							<li class="skillA1"><span class="bar one skill1"></span>
								<h4>Verilog/VHDL, Python, C/C++</h4></li>
							<li class="skillA2"><span class="bar two skill2"></span>
								<h4>State Machines, System Design</h4></li>
							<li class="skillA3"><span class="bar four skill3"></span>
								<h4>Analog/Digital Circuit Design</h4></li>
							<li class="skillA4"><span class="bar seven skill4"></span>
								<h4>Java, HTML, CSS, JS</h4></li>
							<li class="skillA5"><span class="bar three skill5"></span>
								<h4>Lab Equipment</h4></li>
							<li class="skillA6"><span class="bar five skill6"></span>
								<h4>SPICE, Cadence, Eagle</h4></li>
							<li class="skillA7"><span class="bar six skill7"></span>
								<h4>ASICs, FPGAs, Electronics</h4></li>
						</ul>
					</div>
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
	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.easing.min.js"></script>
	<script src="bootstrap/js/scrolling-nav.js"></script>
</body>
</html>
