@extends('layout.index')

@section('content')

 	 <!-- /w3l-agile -->
		<!-- //header-ends -->
			<div id="page-wrapper">
				<div class="inner-content">
				      <div class="music-browse">
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
					
						<div class="browse">
								<div class="tittle-head two">
									<h3 class="tittle">Singer </h3>
									 <a href="browse.html"></a>
									<div class="clearfix"> </div>
								</div>
								<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								  
								<div id="myTabContent" class="tab-content">
								  <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
									<div class="browse-inner">
								 	 <!-- /agileits -->
								@foreach($singer as $si)
									<div class="col-md-3 artist-grid">
										<a  href="single.html"><img src="upload/img/singer/{{$si->img}}" title="singer-name" style="height: 200px"></a>
										<a href="single.html"><i class="glyphicon glyphicon-play-circle"></i></a>
										<a class="art" href="single.html">{{$si->name}}</a>
									</div>
								@endforeach
									<div class="clearfix"> </div>

									<div class="row">
										<div class="col-md-4 col-xs-4">
											
										</div>
										<div>
											{{$singer->links()}}
										</div>
										
									</div>
									</div>
								  </div>
								</div>
							</div>
						 	 <!-- /agileinfo -->
						
					<!--//End-albums-->
					
						
							<!--//music-left-->
							
						<!--body wrapper start-->
						
						
			      
			</div>

@endsection
