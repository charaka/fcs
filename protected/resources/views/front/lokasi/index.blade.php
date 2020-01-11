@extends('front.template')
@section('content')
@if(!empty($slide->image))
<section class="banner banner-full" style="background: url({{ url($slide->image) }});background-size: cover;background-position: center;">
@else
@endif
	<div class="banner-transparent">
	</div>
</section>
<section class="tabs">
	<div >
		<!-- Nav tabs -->
		<div class="container">
			<ul class="nav nav-tabs" role="tablist" style="justify-content: space-between;border-bottom: 1px solid #888c91;">
		        <li role="presentation" class="active"><a href="#about" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
		        <li role="presentation"><a href="#schedule" aria-controls="profile" role="tab" data-toggle="tab">Schedule</a></li>
		        <li role="presentation"><a href="#session" aria-controls="profile" role="tab" data-toggle="tab">Session</a></li>
		        <li role="presentation"><a href="#fees" aria-controls="profile" role="tab" data-toggle="tab">Programs &amp; Fees</a></li>
		    </ul>
		</div>
	    <!-- Tab panes -->
	    <div class="tab-content">
	    	<div role="tabpanel" class="tab-pane active" id="about">
	        	<div class="container">
		            <section class="about-program">
						@if(!empty($about))
						{!! $about->konten_en !!}
						@else
						@endif
					</section>
					<section class="part-program">
						<p class="main-title">Our Partners</p>
						<br/>
						<div class="row">
							@if(count($partners)>0)
								@foreach($partners AS $partner)
									<div class="col-md-2 col-sm-6 col-12">
										<div class="box-partner">
											<div class="head">
												{!! $partner->konten_en !!}
											</div>
										</div>
									</div>
								@endforeach
							@else

							@endif
							
						</div>
					</section>
					<section class="focus-program">
						<p class="main-title">OUR FOCUS</p>
						<div class="row">
							@if(count($focuses)>0)
								@foreach($focuses AS $focus)
								<div class="col-sm-4">
									@if(!empty($focus->cover))
										<img src="{{ url($focus->cover) }}">
									@else
									@endif
									<p class="about-title">
										{!! $focus->judul_en !!}
									</p>
									{!! $focus->konten_en !!}
								</div>
								@endforeach
							@else

							@endif
						</div><!-- / ROW -->
					</section>
				</div>
				<section class="highligh">
					<div class="row">
						<div class="col-md-6">
							<div class="highligh-inner">
								@if(count($highlights)>0)
									<!-- {{ $i=1 }} -->
									@foreach($highlights AS $highlight)
									<div class="image {{ $i==1?'':'bot' }}" style="background: url({{url($highlight->cover)}});background-size: cover;background-position: center;">
									</div>
									<!-- {{ $i++ }} -->
									@endforeach
								@else

								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="highligh-right">
								<p class="highlight-title">PROGRAM HIGHLIGHT</p>
								<ul class="hlist round">
									@if(count($highlights)>0)
										@foreach($highlights AS $highlight)
										<li>
											<span class="list-title">{!! $highlight->judul_en !!}</span>
											{!! $highlight->konten_en !!}
										</li>
										@endforeach
									@else

									@endif
								</ul>
							</div>
						</div>
					</div><!-- / ROW -->
				</section>
				<div class="container">
					<section class="counting">
						<div class="row">
							<div class="col-3">
								<div class="count">
									<p class="number">04</p>
									<p class="subtitle">DAYS</p>
								</div>
							</div>
							<div class="col-3">
								<div class="count">
									<p class="number">31</p>
									<p class="subtitle">PARTICIPANT<br/>COUNTRY</p>
								</div>
							</div>
							<div class="col-3">
								<div class="count">
									<p class="number">05</p>
									<p class="subtitle">PROGRAMS <br/>SEGMENT</p>
								</div>
							</div>
							<div class="col-3">
								<div class="count">
									<p class="number">01</p>
									<p class="subtitle">LOCATION</p>
								</div>
							</div>
						</div><!-- / ROW -->
					  	<div class="row justify-content-md-center">
						    <div class="col-md-auto">
						      	<a href="#" class="btn btn-block btn-width btn-blue">SEE THE SCHEDULE</a>
						    </div>
					  	</div>
					</section>
				</div>
				<br/>
				<section class="program-segment">
					<p class="main-title">PROGRAM SEGMENTS</p>
					<div class="row">
						@if(count($segments)>0)
							<!-- {{ $i=1 }} -->
							@foreach($segments AS $segment)
							<div class="col-md-6 col-sm-6 col-12">
								<div class="box-segment">
									@if(!empty($segment->cover))
										<img src="{{ url($segment->cover) }}">
									@else
									@endif
									<p class="title">{{ $segment->judul_en }}</p>
									{!! $segment->konten_en !!}
								</div>
							</div>
							<!-- {{ $i++ }} -->
							@endforeach
						@else

						@endif						
						
						<div class="col-md-12 col-sm-12 col-12">
							<div class="box-apply">
								<p class="title">Apply as Delegate</p>
								<p class="description">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
								<a href="#" class="btn btn-primary outline btn-block btn-custom-apply">APPLY</a>
							</div>
						</div>
					</div><!-- / ROW -->
				</section>
	        </div>
	        <div role="tabpanel" class="tab-pane" id="schedule">
	        	<p class="program-title">PPP by Youth {{ $lokasi->lokasi }} Event Schedule</p>
	            <section class="schedule">
	            	<div class="container">
	            		<div class="row">
							<div class="col-md-12">
								<div class="schedule-inner">
									@if(!empty($schedule))
									{!! $schedule->konten_en !!}
									@else
									@endif
								</div>
							</div>
						</div><!-- / ROW -->
	            	</div>
				</section>
	        </div>
	        <div role="tabpanel" class="tab-pane" id="session">
	            <p class="program-title">About PPP By Youth Bandung</p>
            	<div class="container">
            		<div class="row">
            			<div class="session-desc text-justify">
            				<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
            			</div>
					</div><!-- / ROW -->
					<section class="session-moderator text-center">
						<div class="row">
							<div class="session-day">
								<p class="program-title">Keynote Speakers and Moderators</p>
								<div class="session-box">
									<p class="session-date">DAY 1, 20TH JANUARY 2020</p>
									<p class="session-date-desc">Fireside Chat on <q>Bandung</q></p>
									<div class="row">
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/management.jpg" class="img-circle">
											<p class="main-title">MANAGEMENT TEAMS</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/advisory.jpg" class="img-circle">
											<p class="main-title">ADVISORY BOARD</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/advisory.jpg" class="img-circle">
											<p class="main-title">ADVISORY BOARD</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/advisory.jpg" class="img-circle">
											<p class="main-title">ADVISORY BOARD</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
									</div><!-- / ROW -->
								</div>
								<div class="session-box">
									<p class="session-date">DAY 1, 20TH JANUARY 2020</p>
									<p class="session-date-desc">Fireside Chat on <q>Bandung</q></p>
									<div class="row">
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/management.jpg" class="img-circle">
											<p class="main-title">MANAGEMENT TEAMS</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/advisory.jpg" class="img-circle">
											<p class="main-title">ADVISORY BOARD</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/advisory.jpg" class="img-circle">
											<p class="main-title">ADVISORY BOARD</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
										<div class="col-sm-6 col-lg-3 col-12">
											<img src="http://fcs.wiryasoftware.com/assets/images/about/advisory.jpg" class="img-circle">
											<p class="main-title">ADVISORY BOARD</p>
											<p class="main-desc" style="line-height: 1px;">Lorem ipsum dolor sit amet</p>
										</div>
									</div><!-- / ROW -->
								</div>
							</div>
						</div>
					</section>
            	</div>
	        </div>
	        <div role="tabpanel" class="tab-pane" id="fees">
	        	<p class="program-title">Ticketing</p>
	        	<section class="ticket">
	        		<div class="container">
	        			<div class="row">
	        				<div class="col-md-6 col-12">
	        					<img src="http://fcs.wiryasoftware.com/assets/images/PPPByYouth/ticket/ticket1.png">
	        				</div>
	        				<div class="col-md-6 col-12">
	        					<img src="http://fcs.wiryasoftware.com/assets/images/PPPByYouth/ticket/ticket2.png">
	        				</div>
	        			</div>
	        			<p class="ticket-desc text-center">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
						<div class="row btn-apply">
							<div class="col-md-6 col-12">
	        					<div class="row justify-content-md-center">
								    <div class="col-md-auto">
								      	<a href="#" class="btn btn-block btn-width btn-blue">APPLY &amp; PAY NOW</a>
								    </div>
							  	</div>
	        				</div>
	        				<div class="col-md-6 col-12">
	        					<div class="row justify-content-md-center">
								    <div class="col-md-auto">
								      	<a href="#" class="btn btn-block btn-width btn-blue">APPLY &amp; PAY LATER</a>
								    </div>
							  	</div>
	        				</div>
						</div>
	        		</div>
	        	</section>    
	        </div>   
	    </div>
	</div><!-- / ROW -->
</section>
@endsection