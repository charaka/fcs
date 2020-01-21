@extends('front.template')
@section('content')
<section class="slider">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="http://fcs.wiryasoftware.com/assets/images/sliders/659ba2461462bb4bd63212f98aea381d.jpg" class="img-fluid">
				<div class="carousel-caption">
				<h5>Victoria By The Bay</h5>
				<p>Testas,mndjfnvjsdnkvskdmvcsmcmvsmlvcmlsdmlcvsdcv</p>
				</div>
			</div>
			<div class="carousel-item ">
				<img src="http://fcs.wiryasoftware.com/assets/images/sliders/a2b38818bc0dad0b7e85d90337142545.jpg" class="img-fluid">
				<div class="carousel-caption">
				<h5>Victoria By The Bay</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</div>
			</div>
			<div class="carousel-item ">
				<img src="http://fcs.wiryasoftware.com/assets/images/sliders/0a2086fa4af24f44e598383d7ac93785.jpg" class="img-fluid">
				<div class="carousel-caption">
				<h5>Victoria By The Bay</h5>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<i class="fas fa-slider fa-chevron-circle-left"></i>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<i class="fas fa-slider fa-chevron-circle-right"></i>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>
<section class="popular">
	<p class="main-title">Most Read</p>
	<div class="row">
		<div class="col-sm-6">
			<div class="box-news">
				<div class="header big">
					<img src="http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg">
				</div>
				<a href="#" class="title">Opening Keynotes at Chicago Hub by Mark</a>
				<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
				<p class="subs">
					by <b>Robin Van Persie</b> in <b>Technology</b>
				</p>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="box-news">
				<div class="header big">
					<img src="http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg">
				</div>
				<a href="#" class="title">This Box Contain 2nd Top Stories from article this month</a>
				<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
				<p class="subs">
					by <b>Robin Van Persie</b> in <b>Technology</b>
				</p>
			</div>
		</div>
	</div><!-- / ROW -->
	<div class="row popular-list">
		<div class="col-sm-11">
			<div class="box-news wide">
				<div class="row">
					<div class="col-md-5">
						<div class="header">
							<img src="http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg">
						</div>
					</div>
					<div class="col-md-7" style="margin: 10px 0 10px -10px;">
						<a href="" class="title">Signing of MOU at Qianhai Hub</a>
						<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
						<p class="subs">
							by <b>Robin Van Persie</b> in <b>Technology</b>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-11">
			<div class="box-news wide">
				<div class="row">
					<div class="col-md-5">
						<div class="header">
							<img src="http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg">
						</div>
					</div>
					<div class="col-md-7" style="margin: 10px 0 10px -10px;">
						<a href="" class="title">Signing of MOU at Qianhai Hub</a>
						<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
						<p class="subs">
							by <b>Robin Van Persie</b> in <b>Technology</b>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-11">
			<div class="box-news wide">
				<div class="row">
					<div class="col-md-5">
						<div class="header">
							<img src="http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg">
						</div>
					</div>
					<div class="col-md-7" style="margin: 10px 0 10px -10px;">
						<a href="" class="title">Signing of MOU at Qianhai Hub</a>
						<p class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
						<p class="subs">
							by <b>Robin Van Persie</b> in <b>Technology</b>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="latest">
	<div class="row">
		<div class="col-sm-7 col-md-9">
			<div class="latest-inner">
				<p class="main-title white">Latest Post</p>
									<div class="box-news-left">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="img">
									<img src="http://fcs.wiryasoftware.com/assets/images/about/emerging-future-cities-network.jpg">
								</div>
							</div>
							<div class="col-md-8 col-sm-12">
								<a href="#" class="title">headline-this Box Contain Recent Post</a>
								<p class="content">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. <a href="#">More</a>
								</p>
								<p class="subs">
									<b>Lionel Messi</b> in <b>Technology</b>. Sep 26 . min read
								</p>
							</div>
						</div>
					</div>
									<div class="box-news-left">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="img">
									<img src="http://fcs.wiryasoftware.com/assets/images/about/emerging-future-cities-network.jpg">
								</div>
							</div>
							<div class="col-md-8 col-sm-12">
								<a href="#" class="title">headline-this Box Contain Recent Post</a>
								<p class="content">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. <a href="#">More</a>
								</p>
								<p class="subs">
									<b>Lionel Messi</b> in <b>Technology</b>. Sep 26 . min read
								</p>
							</div>
						</div>
					</div>
									<div class="box-news-left">
						<div class="row">
							<div class="col-md-4 col-sm-12">
								<div class="img">
									<img src="http://fcs.wiryasoftware.com/assets/images/about/emerging-future-cities-network.jpg">
								</div>
							</div>
							<div class="col-md-8 col-sm-12">
								<a href="#" class="title">headline-this Box Contain Recent Post</a>
								<p class="content">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. <a href="#">More</a>
								</p>
								<p class="subs">
									<b>Lionel Messi</b> in <b>Technology</b>. Sep 26 . min read
								</p>
							</div>
						</div>
					</div>
							</div>
		</div>
		<div class="col-sm-5 col-md-3">
			<div class="latest-right">
				<p class="main-title white">Upcoming Event</p>
														<div class="box-event">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-6">
								<div class="image" style="background:url(http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg);background-size: cover;background-position: center;">
									<div class="box-transparent">
										<p class="day">21</p>
										<p class="month">MAR 20</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-6">
								<div class="event-title">
									Future City Summit 2020
								</div>
							</div>
						</div><!-- / ROW -->
					</div>
															<hr class="white" />
										<div class="box-event">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-6">
								<div class="image" style="background:url(http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg);background-size: cover;background-position: center;">
									<div class="box-transparent">
										<p class="day">21</p>
										<p class="month">MAR 20</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-6">
								<div class="event-title">
									Future City Summit 2020
								</div>
							</div>
						</div><!-- / ROW -->
					</div>
															<hr class="white" />
										<div class="box-event">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-6">
								<div class="image" style="background:url(http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg);background-size: cover;background-position: center;">
									<div class="box-transparent">
										<p class="day">21</p>
										<p class="month">MAR 20</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-6">
								<div class="event-title">
									Future City Summit 2020
								</div>
							</div>
						</div><!-- / ROW -->
					</div>
															<hr class="white" />
										<div class="box-event">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-6">
								<div class="image" style="background:url(http://fcs.wiryasoftware.com/assets/images/about/foundation.jpg);background-size: cover;background-position: center;">
									<div class="box-transparent">
										<p class="day">21</p>
										<p class="month">MAR 20</p>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-6">
								<div class="event-title">
									Future City Summit 2020
								</div>
							</div>
						</div><!-- / ROW -->
					</div>
								<br />
				<a href="#" class="all-event">See All Event <i class="fa fa-chevron-right"></i></a>
			</div>
		</div>
	</div><!-- / ROW -->
</section>
<section class="popular">
	<p class="main-title">Knowledge Exchange</p>
	<div class="row">
					<div class="col-md-4 col-sm-6 col-6">
				<a href="http://fcs.wiryasoftware.com/page/knowledge/finances">
					<div class="box-category" style="background:url(http://fcs.wiryasoftware.com/assets/images/categories/384c92e36921da3c11e44abcd3858fcc.jpg);background-size: cover;background-position: center;">
						<div class="box-transparent">
							<p class="title">Finances</p>
						</div>
					</div>
				</a>
			</div>
					<div class="col-md-4 col-sm-6 col-6">
				<a href="http://fcs.wiryasoftware.com/page/knowledge/future-workforce">
					<div class="box-category" style="background:url(http://fcs.wiryasoftware.com/assets/images/categories/9eb1ecbf1b863b27b8d8a8fca6c79467.jpg);background-size: cover;background-position: center;">
						<div class="box-transparent">
							<p class="title">Future Workforce</p>
						</div>
					</div>
				</a>
			</div>
					<div class="col-md-4 col-sm-6 col-6">
				<a href="http://fcs.wiryasoftware.com/page/knowledge/governance-and-policy">
					<div class="box-category" style="background:url(http://fcs.wiryasoftware.com/assets/images/categories/9ebaebec7af39bbe113ebd9fe5d95ca8.jpg);background-size: cover;background-position: center;">
						<div class="box-transparent">
							<p class="title">Governance and Policy</p>
						</div>
					</div>
				</a>
			</div>
					<div class="col-md-4 col-sm-6 col-6">
				<a href="http://fcs.wiryasoftware.com/page/knowledge/infrastructure-and-urban-development">
					<div class="box-category" style="background:url(http://fcs.wiryasoftware.com/assets/images/categories/d1d87dee2ec3305833d46d6cd4c0e11e.jpg);background-size: cover;background-position: center;">
						<div class="box-transparent">
							<p class="title">Infrastructure and Urban Development</p>
						</div>
					</div>
				</a>
			</div>
					<div class="col-md-4 col-sm-6 col-6">
				<a href="http://fcs.wiryasoftware.com/page/knowledge/lifestyle-and-entertaiment">
					<div class="box-category" style="background:url(http://fcs.wiryasoftware.com/assets/images/categories/714469e3c7d6635a3fb3d2d81c93716c.jpg);background-size: cover;background-position: center;">
						<div class="box-transparent">
							<p class="title">Lifestyle and Entertaiment</p>
						</div>
					</div>
				</a>
			</div>
					<div class="col-md-4 col-sm-6 col-6">
				<a href="http://fcs.wiryasoftware.com/page/knowledge/technologies">
					<div class="box-category" style="background:url(http://fcs.wiryasoftware.com/assets/images/categories/2c20e1653d59c050af059dd0653fdd72.jpg);background-size: cover;background-position: center;">
						<div class="box-transparent">
							<p class="title">Technologies</p>
						</div>
					</div>
				</a>
			</div>
			</div><!-- / ROW -->
</section>
<section class="partnership">
	<p class="title">
		Partnership paragraph.<br />
		Join our impactful community taht is commited to making difference in the world ww share.
	</p>
	<p class="sub">
		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	</p>
	<div class="row">
		<div class="col-md-4 offset-md-2 col-sm-6">
			<a href="#" class="btn btn-block btn-custom">Join As Premium Member</a>
		</div>
		<div class="col-md-4 col-sm-6">
			<a href="#" class="btn btn-block btn-custom">Join As Partner</a>
		</div>
	</div><!-- / ROW -->
</section>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.carousel').carousel();
	})
	$(function() {
		var height = $(".latest-inner").height();
		var windowWidth = $(window).width();
		if (windowWidth > 580) {
			$(".latest-right").css({
				height: height + 40
			});
		}
	});
</script>
@endsection