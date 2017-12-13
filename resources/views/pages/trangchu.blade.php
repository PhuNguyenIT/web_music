@extends('layout.index')

@section('content')

			<!--notification menu end -->
			<!-- //header-ends -->
 	 <!-- /w3l-agileits -->
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="inner-content">
				
				      
				<!--//End-banner-->
					<!--albums-->
					<!-- pop-up-box --> 
							<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
							<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
							 <script>
									$(document).ready(function() {
									$('.popup-with-zoom-anim').magnificPopup({
										type: 'inline',
										fixedContentPos: false,
										fixedBgPos: true,
										overflowY: 'auto',
										closeBtnInside: true,
										preloader: false,
										midClick: true,
										removalDelay: 300,
										mainClass: 'my-mfp-zoom-in'
									});
									});
							</script>		
					<!--//pop-up-box -->
						<div class="albums">
								<div class="tittle-head">
									<h3 class="tittle">New Album <span class="new">New</span></h3>
									<div class="clearfix"> </div>
								</div>
							<div class="row">
								@foreach($newalbum as $nea)
								<div class="col-md-2" style="margin: 5px;">
									<a  href="album/{{$nea->id}}/{{$nea->short_name}}.html"><img src="upload/img/album/{{$nea->img}}" style="width:200px;" ></a>
									<a class="button play-icon popup-with-zoom-anim" href="#">{{$nea->name}}</a>
								</div>
								@endforeach
							</div>
							
							
								<div class="clearfix"> </div>
						</div>
					<!--//End-albums-->
						<!--//discover-view-->
						
						<div class="albums second">
										<div class="tittle-head">
											<h3 class="tittle">New Singer <span class="new">New</span></h3>
											<div class="clearfix"> </div>
										</div>
										 	   
											
										@foreach($newsinger as $new)
											<div class="col-md-3 content-grid">
												<a class="" href="#small-dialog"><img src="upload/img/singer/{{$new->img}}" style="height:250px; width: 250px;  " title="allbum-name"></a>
												<a class="button play-icon popup-with-zoom-anim" href="#">{{$new->name}}</a>
											</div>
										@endforeach
										<div class="clearfix"> </div>
						</div>
								<!--//discover-view-->
						</div>
							
						    
											<div class="clearfix"></div>
			 	 <!-- /w3l-agile-its -->
										
						<!--body wrapper start-->
						
						<div class="review-slider">
								<div class="tittle-head">
									<h3 class="tittle">Featured Albums <span class="new"> New</span></h3>
									<div class="clearfix"> </div>
								</div>
								 <ul id="flexiselDemo1">

							@foreach($style as $s)
								<li>
									<a href="single.html"><img src="upload/img/style/{{$s->img}}" alt=""/></a>
									<div class="slide-title"><h4>{{$s->name}} </div>
									<div class="date-city">
										
										<div class="buy-tickets">
											<a href="single.html">LISTEN NOW</a>
										</div>
									</div>
								</li>
							@endforeach
						
							
							
							
							
							
							</ul>
							<script type="text/javascript">
						$(window).load(function() {
							
						  $("#flexiselDemo1").flexisel({
								visibleItems: 5,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,    		
								pauseOnHover: false,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems: 2
									}, 
									landscape: { 
										changePoint:640,
										visibleItems: 3
									},
									tablet: { 
										changePoint:800,
										visibleItems: 4
									}
								}
							});
							});
						</script>
						<script type="text/javascript" src="js/jquery.flexisel.js"></script>	
						</div>
								</div>
							<div class="clearfix"></div>
						<!--body wrapper end-->
 	 <!-- /w3l-agile -->
					</div>



@endsection
