@extends('layout.index')

@section('content')
<div id="page-wrapper">
				
				<div class="inner-content single">
						   
					<div class="tittle-head">
									<h3 class="tittle">Style <span class="new">{{$Style->name}}</span></h3>
									<div class="clearfix"> </div>
								</div>
						<div class="single_left">
								<!--/sound-main-->
								
							<div class="row">
								<div class="col-md-3 col-xs-3">
									
								</div>
								<div class="col-xs-8 col-md-8">

								@foreach($songsamestyle as $song)
									<div style="width: 600px; height: 60px; background-color: #45b39d; margin-bottom: 5px; border-radius: 15px;">
										<div style="color: white;">

											<div class="col-xs-5 col-md-5" style="padding-top: 12px;">
												{{$song->name}}
											</div>
											
											<div style=" padding-top: 12px;"">
												<audio src="upload/music/{{$song->sound}}" controls></audio>
											</div>
											
										</div>
										
									</div>
								@endforeach

								

								</div>
							</div>
 
							
						 	 <!-- /agileinfo -->
				</div>
				
				 	 <!-- /agileits -->
				<div class="clearfix"> </div>
						<!--//music-right-->

			</div>
			 	 <!-- /w3l-agileits-->
						<!--body wrapper start-->
						

				</div>
			<div class="clearfix"></div>

@endsection