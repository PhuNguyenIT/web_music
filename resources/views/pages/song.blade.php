@extends('layout.index')

@section('content')
<div id="page-wrapper">
				
				<div class="inner-content single">
						   
					<div class="tittle-head">
									<h3 class="tittle">Album <span class="new">Page</span></h3>
									<div class="clearfix"> </div>
								</div>
						<div class="single_left">
								<!--/sound-main-->
								
							<div class="row">
								<div class="col-xs-8 col-md-8">

								@foreach($songsamealbum as $song)
									<div style="width: 600px; height: 60px; background-color: #33cc99; margin-bottom: 5px;">
										<div style="color: white;">
											<div class="col-xs-5 col-md-5">
												{{$song->name}}
											</div>
											<div style="width: 200px;">
												
											</div>
											<audio src="upload/music/{{$song->sound}}" controls></audio>
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