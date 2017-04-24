@extends('layout.master')
<style>
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    top: 60px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>

<script>
	function myFunction() {
	    var x = document.getElementById("snackbar")
	    x.className = "show";
	    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
	}
</script>
<body id="page-top">

<div class="body">
	<!-- HEADER -->
@include('commun.header')

	<!-- INTRO -->
	<div class="intro intro-style1">
		<div class="overlay"></div>
		<div class="container">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ implode('', $errors->all() ) }}
					</ul>
				</div>
			@endif
				@if (session('err'))
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('err') }}
					</div>
				@endif

				
				<div id="snackbar">You has been Login successfully!</div>	

				@if (session('message'))
					<?php echo '<script type="text/javascript"> myFunction(); </script>' ?> 
				@endif
			<div class="row center-content">
				<div class="col-md-6 col-sm-8 col-sm-offset-2">
					<h2>What is NAMESQUAD?</h2>
					<p>Get your name in just 4 steps</p>
					@if(Auth::check() )
						@if(Auth::user()->role_id == 2)
							{{link_to_route('request.create','Add new request',null, ['class'=>'btn btn-success btn-large'])}}
						@endif
					@endif

					@if(Auth::check() )
						@if(Auth::user()->role_id == 1)
							{{link_to_route('products.create','Add new Name',null, ['class'=>'btn btn-success btn-large'])}}
						@endif
					@endif
					<a href="#" disabled class="btn btn-success btn-large">Take Tour</a>
				</div>
				<div class="col-md-5 col-md-push-1">
					<img src="{{url('assets/images/1.png')}}" class="img-responsive" alt="Item pic may be.."/>
				</div>
			</div>
		</div>
	</div>

{{--	<!-- SERVICES -->
	<section class="services" id="services">
		<div class="container">
			<div class="section-head text-center col-md-8 col-md-offset-2 space60">
				<h1>What is NAMESQUAD?</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit viverra aliquam lorem id tincidunt. Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</p>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="service-box">
						<span><i class="icon-monitor"></i></span>
						<div>
							<h4>Responsive Design</h4>
							<p>Nam tellus turpis blandit et ligula sit amet semper euismod massa auctor magna eget nunc iaculis nunc.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4">
					<div class="service-box">
						<span><i class="icon-magic-wand"></i></span>
						<div>
							<h4>Magic Animations</h4>
							<p>Nam tellus turpis blandit et ligula sit amet semper euismod massa auctor magna eget nunc iaculis nunc.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4">
					<div class="service-box">
						<span><i class="icon-loop"></i></span>
						<div>
							<h4>Love and Passion</h4>
							<p>Nam tellus turpis blandit et ligula sit amet semper euismod massa auctor magna eget nunc iaculis nunc.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4 col-sm-4">
					<div class="service-box">
						<span><i class="icon-box2"></i></span>
						<div>
							<h4>Out of box design</h4>
							<p>Nam tellus turpis blandit et ligula sit amet semper euismod massa auctor magna eget nunc iaculis nunc.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4">
					<div class="service-box">
						<span><i class="icon-browser"></i></span>
						<div>
							<h4>Cross Browser</h4>
							<p>Nam tellus turpis blandit et ligula sit amet semper euismod massa auctor magna eget nunc iaculis nunc.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4">
					<div class="service-box">
						<span><i class="icon-like"></i></span>
						<div>
							<h4>Most Loved</h4>
							<p>Nam tellus turpis blandit et ligula sit amet semper euismod massa auctor magna eget nunc iaculis nunc.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- TESTIMONIAL -->
	<div class="testimonial-wrap" id="testimonial">
		<div class="container">
			<div class="row center-content">
				<div class="video-box">
					<a href="https://www.youtube.com/watch?v=ir1xdtIb-g0" class="prettyPhoto video-link">
						<span class="fa fa-play"></span>
					</a>
				</div>

				<div class="col-md-6 col-sm-6 hidden-xs">
				</div>

				<div class="col-md-6 col-sm-6">
					<div class="quote">
						<div class="testimonial">
							<div class="quote">
								Suspendisse ac interdum neque. Aliquam volutpat, sem ut placerat tempor, quam enim cursus nibh, eget lacinia velit justo non sapien. Proin efficitur justo ligula, eget semper est lobortis quis.
							</div>
							<div class="author">
								<img class="img-responsive" src="{{url('assets/images/team/4.jpg')}}" alt="">
								<cite><b>John Deo</b>Company Name</cite>
							</div>
						</div>

						<div class="testimonial">
							<div class="quote">
								Praesent convallis aliquet ipsum. Vivamus vel ipsum ornare, egestas arcu eu, eleifend mauris. Cras laoreet maximus massa vel luctus. Nam volutpat tortor vel accumsan congue cras congue augue.
							</div>
							<div class="author">
								<img class="img-responsive" src="{{url('assets/images/team/3.jpg')}}" alt="">
								<cite><b>John Deo</b>Company Name</cite>
							</div>
						</div>

						<div class="testimonial">
							<div class="quote">
								Curabitur consequat turpis vulputate consequat iaculis. Fusce ornare libero massa, non mollis dui condimentum a. In tortor nibh, varius non magna eget, porttitor facilisis lacus iaculis.
							</div>
							<div class="author">
								<img class="img-responsive" src="{{url('assets/images/team/1.jpg')}}" alt="">
								<cite><b>John Deo</b>Company Name</cite>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- ACCORDION -->
	<div class="accordion-wrap">
		<div class="container">
			<div class="section-head text-center col-md-8 col-md-offset-2 space40">
				<h2>Get your Name in just 4 steps</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit viverra aliquam lorem id tincidunt. Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</p>
			</div>
			<div class="row">
				<div class="col-md-5">
					<div class="space50"></div>
					<div class="panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									<i class="fa fa-bold"></i>Bootstrap Based
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="panel-body">
									Morbi tincidunt, ipsum nec tristique mollis, nulla libero fermentum neque, id vehicula ligula diam at arcu. Pellentesque sollicitudin eget nulla sit amet venenatis. Phasellus non mauris orci. Suspendisse nec nibh est.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">
									<i class="fa fa-leaf"></i>Clean &amp; powerful code
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="panel-body">
									Aliquam quis ante eu mi porta lobortis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu varius risus. Curabitur luctus augue vitae ante finibus, sit amet ultrices risus varius. Etiam posuere tortor eget nunc mattis, eu viverra purus faucibus.
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">
									<i class="fa fa-html5"></i>HTML5/CSS3
									</a>
								</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse">
								<div class="panel-body">
									Phasellus varius venenatis congue. Nulla dignissim consectetur nulla ac pellentesque. Nam fringilla mauris metus, id ultrices turpis fermentum sit amet. Mauris at convallis ante. 
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed">
									<i class="fa fa-life-ring"></i>Support 24/7
									</a>
								</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse">
								<div class="panel-body">
									Morbi id nunc et magna consectetur ultricies non vitae velit. Quisque convallis, mi quis imperdiet aliquam, metus justo ultrices quam, et posuere nisi velit id tellus. Praesent a cursus lectus. 
								</div>
							</div>
						</div>
					</div>
					<!-- accordion end -->
				</div>
				<div class="col-md-7">
					<img src="{{url('assets/images/3.png')}}" class="img-responsive" alt=""/>
				</div>
			</div>
		</div>
	</div>

	<!-- FEATURES -->
	<div class="info-content" id="features">
		<div class="container">
			<div class="row center-content">
				<div class="col-md-7 col-sm-6">
					<img src="{{url('assets/images/2.png')}}" class="img-responsive" alt=""/>
				</div>
				<div class="col-md-5 col-sm-6">
					<h4>Creative design & Responsive</h4>
					<div class="space10"></div>
					<p>Lorem ipsum dolor sit amet exerci tation aliquip ex. Suspendisse aliquet imperdiet commodo. Aenean vel lacinia elit. Class aptent taciti sociosqu ad litora torquent per.</p>
					<div class="space20"></div>
					<ul class="list">
						<li><i class="icon-check2"></i> Etiam sed dolor ac diam volutpat</li>
						<li><i class="icon-check2"></i> Sed eget pulvinar quam enim aliquam </li>
						<li><i class="icon-check2"></i> Erat volutpat aliquet imperdiet</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- FACTS -->
	<section class="facts-wrap facts-full">
		<div class="container-fluid no-padding">
			<div class="row">
				<div class="col-md-3 col-sm-3 fact">
					<h3><span class="counter fact1">0</span>+</h3>
					<h4>Customers</h4>
				</div>

				<div class="col-md-3 col-sm-3 fact">
					<h3><span class="counter fact2">0</span></h3>
					<h4>Happy Clients</h4>
				</div>
				<div class="col-md-3 col-sm-3 fact">
					<h3><span class="counter fact3">0</span> +</h3>
					<h4>Elements</h4>
				</div>
				<div class="col-md-3 col-sm-3 fact">
					<h3><span class="counter fact4">0</span></h3>
					<h4>Lines of Code</h4>
				</div>
			</div>
		</div>
	</section>

	<!-- TEAM -->
	<div class="team" id="team">
		<div class="container">
			<div class="section-head text-center col-md-8 col-md-offset-2 space40">
				<h1>Our Awesome team</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit viverra aliquam lorem id tincidunt. Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</p>
			</div>

			<div class="row">
				<div class="col-sm-6 col-md-3">
					<!-- item 1 -->
					<div class="team-box">
						<figure>
							<img class="img-responsive" src="{{url('assets/images/team/1.jpg')}}" alt="">
						</figure>
						<div>
							<h4>John Doe</h4>
							<small>CEO</small>
							<p>Sed ut unde omnis iste natus error sit accus antium dolor emque laudantium.</p>
							<ul class="list-inline social-icons icon-circle">
								<li><a href="#" class="social fa fa-facebook"></a></li>
								<li><a href="#" class="social fa fa-twitter"></a></li>
								<li><a href="#" class="social fa fa-google-plus"></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<!-- item 2 -->
					<div class="team-box">
						<figure>
							<img class="img-responsive" src="{{url('assets/images/team/2.jpg')}}" alt="">
						</figure>
						<div>
							<h4>John Doe</h4>
							<small>Marketing</small>
							<p>Sed ut unde omnis iste natus error sit accus antium dolor emque laudantium.</p>
							<ul class="list-inline social-icons icon-circle">
								<li><a href="#" class="social fa fa-facebook"></a></li>
								<li><a href="#" class="social fa fa-twitter"></a></li>
								<li><a href="#" class="social fa fa-google-plus"></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<!-- item 3 -->
					<div class="team-box">
						<figure>
							<img class="img-responsive" src="{{url('assets/images/team/3.jpg')}}" alt="">
						</figure>
						<div>
							<h4>John Doe</h4>
							<small>Developer</small>
							<p>Sed ut unde omnis iste natus error sit accus antium dolor emque laudantium.</p>
							<ul class="list-inline social-icons icon-circle">
								<li><a href="#" class="social fa fa-facebook"></a></li>
								<li><a href="#" class="social fa fa-twitter"></a></li>
								<li><a href="#" class="social fa fa-google-plus"></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<!-- item 4 -->
					<div class="team-box">
						<figure>
							<img class="img-responsive" src="{{url('assets/images/team/4.jpg')}}" alt="">
						</figure>
						<div>
							<h4>John Doe</h4>
							<small>Designer</small>
							<p>Sed ut unde omnis iste natus error sit accus antium dolor emque laudantium.</p>
							<ul class="list-inline social-icons icon-circle">
								<li><a href="#" class="social fa fa-facebook"></a></li>
								<li><a href="#" class="social fa fa-twitter"></a></li>
								<li><a href="#" class="social fa fa-google-plus"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- PRICING -->
	<div class="pricing-table" id="pricing">
		<div class="container">
			<div class="section-head text-center col-md-8 col-md-offset-2 space60">
				<h1>Check our Pricing</h1>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit viverra aliquam lorem id tincidunt. Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</p>
			</div>

			<div class="row">
				<div class="col-md-3 col-sm-6 no-padding">
					<div class="plan">
						<h3 class="plan-title">Starter</h3>
						<p class="plan-price">$19 <span class="plan-unit">per month</span></p>
						<ul class="plan-features">
							<li><b>200mb</b> Storage</li>
							<li><b>100mb</b> Bandwidth</li>
							<li><b>3</b> Email Accounts</li>
							<li><b>Free</b> Upgrade</li>
							<li><b>99%</b> Uptime</li>
						</ul>
						<a href="#" class="btn btn-primary btn-block">Choose Plan</a>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 no-padding">
					<div class="plan plan-highlight">
						<p class="plan-recommended">Recommended</p>
						<h3 class="plan-title">Developer</h3>
						<p class="plan-price">$29 <span class="plan-unit">per month</span></p>
						<ul class="plan-features">
							<li><b>200mb</b> Storage</li>
							<li><b>100mb</b> Bandwidth</li>
							<li><b>3</b> Email Accounts</li>
							<li><b>Free</b> Upgrade</li>
							<li><b>99%</b> Uptime</li>
						</ul>
						<a href="#" class="btn btn-primary btn-block">Choose Plan</a>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 no-padding">
					<div class="plan">
						<h3 class="plan-title">Premium</h3>
						<p class="plan-price">$49 <span class="plan-unit">per month</span></p>
						<ul class="plan-features">
							<li><b>200mb</b> Storage</li>
							<li><b>100mb</b> Bandwidth</li>
							<li><b>3</b> Email Accounts</li>
							<li><b>Free</b> Upgrade</li>
							<li><b>99%</b> Uptime</li>
						</ul>
						<a href="#" class="btn btn-primary btn-block">Choose Plan</a>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 no-padding">
					<div class="plan">
						<h3 class="plan-title">Deluxe</h3>
						<p class="plan-price">$99 <span class="plan-unit">per month</span></p>
						<ul class="plan-features">
							<li><b>200mb</b> Storage</li>
							<li><b>100mb</b> Bandwidth</li>
							<li><b>3</b> Email Accounts</li>
							<li><b>Free</b> Upgrade</li>
							<li><b>99%</b> Uptime</li>
						</ul>
						<a href="#" class="btn btn-primary btn-block">Choose Plan</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- BLOG -->
	<div class="home-blog">
		<div class="container-fluid no-padding">
			<div class="container">
				<div class="section-head text-center col-md-8 col-md-offset-2 space40">
					<h1>Lastest blog posts</h1>
					<p>Lorem ipsum dolor sit amet consectetur adipiscing elit viverra aliquam lorem id tincidunt. Praesent et viverra massa non varius magna eget nibh vitae velit posuere efficitur.</p>
				</div>
			</div>

			<article class="blog-item col-md-3 col-sm-6 no-padding">
				<div class="blog-mason-item">
					<a href="blog-post.html">
					<img src="{{url('assets/images/blog/1/1.jpg')}}" class="img-responsive img-hover" alt="">
					</a>
					<div class="blog-mason-excerpt">
						<h2>
							<a href="#">New app available on market</a>
						</h2>
						<div class="blog-meta"><i class="icon-clock2"></i> Jan 23 <i class="icon-head"></i> Admin <i class="icon-speech-bubble"></i> 3 Comments </div>
					</div>
				</div>
			</article>

			<article class="blog-item col-md-3 col-sm-6 no-padding">
				<div class="blog-mason-item">
					<a href="blog-post.html">
					<img src="{{url('assets/images/blog/1/2.jpg')}}" class="img-responsive img-hover" alt="">
					</a>
					<div class="blog-mason-excerpt">
						<h2>
							<a href="#">Architecture<br>amazing people</a>
						</h2>
						<div class="blog-meta"><i class="icon-clock2"></i> Jan 17 <i class="icon-head"></i> Admin <i class="icon-speech-bubble"></i> 3 Comments </div>
					</div>
				</div>
			</article>

			<article class="blog-item col-md-3 col-sm-6 no-padding">
				<div class="blog-mason-item">
					<a href="blog-post.html">
					<img src="{{url('assets/images/blog/1/3.jpg')}}" class="img-responsive img-hover" alt="">
					</a>
					<div class="blog-mason-excerpt">
						<h2>
							<a href="#">Our product comes<br>with a ebook</a>
						</h2>
						<div class="blog-meta"><i class="icon-clock2"></i> Jan 10 <i class="icon-head"></i> Admin <i class="icon-speech-bubble"></i> 3 Comments </div>
					</div>
				</div>
			</article>

			<article class="blog-item col-md-3 col-sm-6 no-padding">
				<div class="blog-mason-item">
					<a href="blog-post.html">
					<img src="{{url('assets/images/blog/1/4.jpg')}}" class="img-responsive img-hover" alt="">
					</a>
					<div class="blog-mason-excerpt">
						<h2>
							<a href="#">Product for the fashion world</a>
						</h2>
						<div class="blog-meta"><i class="icon-clock2"></i> Jan 07 <i class="icon-head"></i> Admin <i class="icon-speech-bubble"></i> 3 Comments </div>
					</div>
				</div>
			</article>
		</div>
	</div>

	<!-- CONTACT -->
	<div class="contact">
		<div class="container">
			<div class="row">
				<aside class="col-md-3 col-sm-4">
					<div class="sidebar">
						<h3>Contact</h3>
						<ul class="list">
							<li><i class="icon-home"></i>795 Folsom Ave, Suite 600<br><span class="pl-20">San Francisco, NY 20001</span></li>
							<li><i class="icon-call"></i><abbr title="Phone">P:</abbr> (123) 456-7890</li>
							<li><i class="icon-phone"></i><abbr title="Mobile">M:</abbr> (123) 456-7890</li>
							<li><i class="icon-mail"></i><a href="mailto:info@website.com">info@website.com</a></li>
						</ul>
						<br>
						<ul class="list-inline social-icons icon-circle">
							<li><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
							<li><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
							<li><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
							<li><a target="_blank" href="http://www.skype.com"><i class="fa fa-dribbble"></i></a></li>
							<li><a target="_blank" href="http://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
				</aside>

				<div class="col-md-8 col-md-push-1 col-sm-8">
					<p class="lead">It would be great to hear from you! Just drop us a line and ask for anything with which you think we could be helpful. We are looking forward to hearing from you!</p>
					<div class="contact-form">
						<form name="sentMessage" id="contactForm" action="php/contact.php" method="post">
							<div class="form-group has-feedback">
								<label>Name*</label>
								<input name="senderName" id="senderName" class="form-control" type="text" required>
								<i class="fa fa-user form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label>Email*</label>
								<input name="senderEmail" id="senderEmail" class="form-control" type="email" required>
								<i class="fa fa-envelope form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label>Subject*</label>
								<input class="form-control" name="subject" id="subject" type="text">
								<i class="fa fa-navicon form-control-feedback"></i>
							</div>
							<div class="form-group has-feedback">
								<label>Message*</label>
								<textarea class="form-control" name="message" id="message" rows="6"></textarea>
								<i class="fa fa-pencil form-control-feedback"></i>
							</div>
							<button type="submit" class="submit-button btn btn-primary btn-lg">Send Message</button>
						</form>
						<div id="sendingMessage" class="statusMessage">
							<p><i class="fa fa-spin fa-spinner"></i> Sending your message. Please wait...</p>
						</div>

						<div id="successMessage" class="successmessage">
							<p><span class="success-ico"></span> Thanks for sending your message! We'll get back to you shortly.</p>
						</div>
					
						<div id="failureMessage" class="errormessage">
							<p><span class="error-ico"></span> There was a problem sending your message. Please try again.</p>
						</div>
					
						<div id="incompleteMessage" class="statusMessage">
							<p><i class="fa fa-warning"></i> Please complete all the fields in the form before sending.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- CALL TO ACTION -->
	<div class="cta-wrap">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-8 col-md-offset-2">
					<h2>Loved Helium ? Then goahead..</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem amet voluptas accusamus, dolorum veritatis ea odio, doloremque, consequatur deleniti aut maxime quod nulla iure ut maiores.</p>
					<div class="space20"></div>
					<a href="#" class="btn btn-lg btn-default">Purchase Now <i class="fa fa-shopping-cart"></i></a>
				</div>
			</div>
		</div>
	</div>--}}

	@include('commun.footer')
	@include('layout.user-login')
	@include('layout.user-signup')
	@include('layout.forget-password')
	@include('layout.logout')

</div>




