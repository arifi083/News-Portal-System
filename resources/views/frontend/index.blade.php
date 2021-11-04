@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@php
  $firstsectionbig = DB::table('posts')->where('first_section_thumbnail',1)->orderBy('id','desc')->first();
  $firstsection = DB::table('posts')->where('first_section',1)->orderBy('id','desc')->limit(8)->get();
@endphp
	<!-- 1st-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div> 
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
	 <div class="service-img"><a href="#"><img src="{{ asset($firstsectionbig->image) }}" width="800px" alt="Notebook"></a></div>
								<div class="content">
	<h4 class="lead-heading-01"><a href="{{ url('view/post/'.$firstsectionbig->id) }}">
		          @if(session()->get('language') == 'bangla') 
						{{ $firstsectionbig->title_bn }}
				  @else 
						{{ $firstsectionbig->title_en }}
				  @endif
		 </a> </h4>
								</div>
							</div>
						</div>
						
					</div>


						<div class="row">

						     @foreach($firstsection as $row)
								<div class="col-md-3 col-sm-3">
									<div class="top-news">
										<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
										<h4 class="heading-02"><a href="{{ url('view/post/'.$row->id) }}">
										@if(session()->get('language') == 'bangla') 
						                    {{ $row->title_bn }}
				                        @else 
						                    {{ $row->title_en }}
				                       @endif
										</a> </h4>
									</div>
								</div>

                            @endforeach
								
						</div>
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
		@php
		  $horizontal = DB::table('ads')->where('type',1)->skip(1)->first();
		@endphp
	   <div class="add">
	       @if($horizontal == NULL)
		   @else
			   <a href="{{ $horizontal->link }}" target="_blank" ><img src="{{ asset($horizontal->adds) }}" alt="" /></a>
			@endif
		</div>
						</div>
					</div><!-- /.add-close -->	



					
					<!-- news-start -->
					<div class="row">

                     @php
					   $firstcategory = DB::table('categories')->first();
					   $firstcatpostbig = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',1)->first();
					   $firstcatpostsmall = DB::table('posts')->where('category_id',$firstcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
                     @endphp
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
								   @if(session()->get('language') == 'bangla') 
						               {{ $firstcategory->category_bn }}
                                   @else 
						              {{ $firstcategory->category_en }}
				                    @endif
									<span>
									<span>
									 @if(session()->get('language') == 'bangla') 
									      অধিক
	                                  @else
		                                   More 
		                              @endif
									 <i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="#"><img src="{{ asset($firstcatpostbig->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="{{ URL::to('view/post/'.$firstcatpostbig->id) }}">
											  @if(session()->get('language') == 'bangla') 
						                          {{ $firstcatpostbig->title_bn }}
                                              @else 
						                         {{ $firstcatpostbig->title_en }}
				                              @endif
											  </a></h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($firstcatpostsmall as $row)
										<div class="image-title">
											<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="{{ url('view/post/'.$row->id) }}">
											   @if(session()->get('language') == 'bangla') 
						                          {{ $row->title_bn }}
                                              @else 
						                         {{ $row->title_en }}
				                              @endif
											</a> </h4>
										</div>
									   @endforeach
									</div>
								</div>
							</div>
						</div>

		@php
			 $secondcategory = DB::table('categories')->skip(1)->first();
			 $secondcatpostbig = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',1)->first();
			 $secondcatpostsmall = DB::table('posts')->where('category_id',$secondcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
        @endphp

						
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title"><a href="#">
								   @if(session()->get('language') == 'bangla') 
						               {{ $secondcategory->category_bn }}
                                   @else 
						              {{ $secondcategory->category_en }}
				                    @endif
									<span>
									  @if(session()->get('language') == 'bangla') 
									      অধিক
	                                   @else
		                                   More 
		                              @endif
									<i class="fa fa-angle-double-right" aria-hidden="true"></i></span></a></div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="#"><img src="{{ asset($secondcatpostbig->image) }}" alt="Notebook"></a>
											<h4 class="heading-02"><a href="#">
											  @if(session()->get('language') == 'bangla') 
						                          {{ $secondcatpostbig->title_bn }}
                                              @else 
						                         {{ $secondcatpostbig->title_en }}
				                              @endif
											</a> </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
									   @foreach($secondcatpostsmall as $row)
										<div class="image-title">
											<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
											<h4 class="heading-03"><a href="#">
										    @if(session()->get('language') == 'bangla') 
						                          {{ $row->title_bn }}
                                            @else 
						                         {{ $row->title_en }}
				                            @endif
											</a> </h4>
										</div>
									   @endforeach
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
                         @php
						   $vertical = DB::table('ads')->where('type',2)->first();
                         @endphp
							 <div class="sidebar-add">
                              @if($vertical == NULL)
						      @else
					    	    <a href="{{ $vertical->link }}" target="_blank" ><img src="{{ asset($vertical->adds) }}" alt="" /></a>
						      @endif
							</div>
						</div>
					</div><!-- /.add-close -->	


					
					<!-- youtube-live-start -->	
                    @php 
                        $livetv = DB::table('livetvs')->first();
                    @endphp
                     
                    @if($livetv->status == 1)
					<div class="cetagory-title-03">Live TV</div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
                          {!! $livetv->embed_code  !!}<iframe width="560" height="315" src="https://www.youtube.com/embed/Xmm3Kr5P1Uw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
                    
                    @endif
                    <!-- /.youtube-live-close -->	
					




					<!-- facebook-page-start -->
					<div class="cetagory-title-03">Facebook </div>
					<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0" nonce="e3bknVAk"></script>
<div class="fb-page" data-href="https://www.facebook.com/kaziariyanbd" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/kaziariyanbd" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kaziariyanbd">Kazi Ariyan</a></blockquote></div>
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
						@php
						   $vertical = DB::table('ads')->where('type',2)->skip(1)->first();
                         @endphp
							<div class="sidebar-add">
							  @if($vertical == NULL)
						       @else
					    	     <a href="{{ $vertical->link }}" target="_blank" ><img src="{{ asset($vertical->adds) }}" alt="" /></a>
						       @endif
							</div>
						</div>
					</div><!-- /.add-close -->	
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">

	@php
		 $thirdcategory = DB::table('categories')->skip(2)->first();
		 $thirdcatpostbig = DB::table('posts')->where('category_id',$thirdcategory->id)->where('bigthumbnail',1)->first();
		 $thirdcatpostsmall = DB::table('posts')->where('category_id',$thirdcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
     @endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
						@if(session()->get('language') == 'bangla') 
						    {{ $thirdcategory->category_bn }}
                        @else 
						    {{ $thirdcategory->category_en }}
				        @endif
							 <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
							 @if(session()->get('language') == 'bangla') 
							   সব খবর
	                        @else
							  All News
		                     @endif </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{ asset($thirdcatpostbig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">
									   @if(session()->get('language') == 'bangla') 
						                    {{ $thirdcatpostbig->title_bn }}
                                        @else 
						                    {{ $thirdcatpostbig->title_en }}
				                        @endif
									</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
                                
							    @foreach($thirdcatpostsmall as $row)
								<div class="image-title">
									<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">
								    	@if(session()->get('language') == 'bangla') 
						                     {{ $row->title_bn }}
                                        @else 
						                    {{ $row->title_en }}
				                        @endif
									</a> </h4>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>

	@php
		 $fourcategory = DB::table('categories')->skip(3)->first();
		 $fourcatpostbig = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',1)->first();
		 $fourcatpostsmall = DB::table('posts')->where('category_id',$fourcategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
     @endphp


				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
						 @if(session()->get('language') == 'bangla') 
						    {{ $fourcategory->category_bn }}
                        @else 
						    {{ $fourcategory->category_en }}
				        @endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i>
							@if(session()->get('language') == 'bangla') 
							   সব খবর
	                        @else
							  All News
		                     @endif
							 
						</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{ asset($fourcatpostbig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">
									@if(session()->get('language') == 'bangla') 
						                {{ $fourcatpostbig->title_bn }}
                                    @else 
						                {{ $fourcatpostbig->title_en }}
				                    @endif	
									</a> </h4>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
						  	 @foreach($fourcatpostsmall as $row)
								<div class="image-title">
									<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">
									   @if(session()->get('language') == 'bangla') 
						                     {{ $row->title_bn }}
                                       @else 
						                    {{ $row->title_en }}
				                        @endif
								  </a> </h4>
								</div>
								
							 @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ******* -->

			<div class="row">

		@php
		  $fivecategory = DB::table('categories')->skip(4)->first();
		  $fivecatpostbig = DB::table('posts')->where('category_id',$fivecategory->id)->where('bigthumbnail',1)->first();
		  $fivecatpostsmall = DB::table('posts')->where('category_id',$fivecategory->id)->where('bigthumbnail',NULL)->limit(3)->get();
        @endphp
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">
						 @if(session()->get('language') == 'bangla') 
						    {{ $fivecategory->category_bn }}
                         @else 
						    {{ $fivecategory->category_en }}
				         @endif
							<i class="fa fa-angle-right" aria-hidden="true"></i> 
							<span><i class="fa fa-plus" aria-hidden="true"></i>
							@if(session()->get('language') == 'bangla') 
							   সব খবর
	                        @else
							  All News
		                     @endif 
							</span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{ asset($fivecatpostbig->image) }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">
									 @if(session()->get('language') == 'bangla') 
						                {{ $fivecatpostbig->title_bn }}
                                     @else 
						                {{ $fivecatpostbig->title_en }}
				                     @endif	
								   </a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
							  @foreach($fivecatpostsmall as $row)
								<div class="image-title">
									<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">
									  @if(session()->get('language') == 'bangla') 
						                     {{ $row->title_bn }}
                                      @else 
						                    {{ $row->title_en }}
				                      @endif
									</a> </h4>
								</div>
								
							 @endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title-02"><a href="#">Education <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
								<div class="image-title">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-03"><a href="#">Students won't get form fill-up fee back</a> </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- add-start -->	
			<div class="row">
			  
			@php
			  $horizontal = DB::table('ads')->where('type',1)->skip(2)->first();
			@endphp
				<div class="col-md-6 col-sm-6">
					<div class="add">
					@if($horizontal == NULL)
					@else
					  <a href="{{ $horizontal->link }}" target="_blank" ><img src="{{ asset($horizontal->adds) }}" alt="" /></a>
					@endif
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
	@php
		$horizontal = DB::table('ads')->where('type',1)->skip(3)->first();
	@endphp
					<div class="add">
					 @if($horizontal == NULL)
					 @else
					  <a href="{{ $horizontal->link }}" target="_blank" ><img src="{{ asset($horizontal->adds) }}" alt="" /></a>
					 @endif
					</div>
				</div>
			</div><!-- /.add-close -->	
			
		</div>
	</section><!-- /.2nd-news-section-close -->

	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="cetagory-title-02"><a href="#">Feature  <i class="fa fa-angle-right" aria-hidden="true"></i> all district news tab here <span><i class="fa fa-plus" aria-hidden="true"></i> All News  </span></a></div>
					
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="top-news">
								<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-02"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="image-title">
								<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
							<div class="image-title">
								<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
								<h4 class="heading-03"><a href="#">Achieving SDG-4 during COVID-19 Pandemic</a> </h4>
							</div>
						</div>
					</div>
					<!-- ******* -->
					<br />
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title-02"><a href="#">Sci-Tech<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="#"><img src="{{ asset('frontend/assets/img/news.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">Facebook Messenger gets shiny new logo </a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
							<div class="news-title">
								<a href="#">Facebook Messenger gets shiny new logo </a>
							</div>
						</div>
					</div>
					<br><br><br>


	<div class="row">
	@php
	   $district = DB::table('district')->get();
	@endphp

		<div class="cetagory-title-02"><a href="#">Search By District<i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i></span></a></div>
		<form method="get" action="{{ route('search-by-district') }}">
			@csrf
			<div class="row mt-3">
				<div class="col-lg-4">
				    <select class="form-control" id="exampleSelectGender" name="district_id">
                        <option disabled="" selected="">--Select District--</option>
                         @foreach($district as $row)
                            <option value="{{ $row->id }}">{{ $row->district_en }}</option>
				        @endforeach
                    
                       </select>
				</div>
				<div class="col-lg-4">
				   <select class="form-control"  name="subdistrict_id" id="subdistrict_id">
                       <option disabled="" selected="">--Select SubDistrict--</option>
                     
                    </select>
				</div>
				<div class="col-lg-4">
                    <button class="btn btn-success btn-block">Search</button>
				</div>

			</div>
		</form>
	</div><!-- end row -->
	<br><br><br>
					
    <div class="row mt-3">
		<div class="col-md-12 col-sm-12">
			<div class="sidebar-add">
				<img src="{{ asset('frontend/assets/img/top-ad.jpg') }}" alt="" />
			</div>
		</div>
	</div><!-- /.add-close -->	

				</div>
 
  @php
    $latest = DB::table('posts')->orderBy('id','desc')->limit(5)->get();
	$popular = DB::table('posts')->orderBy('id','ASC')->inRandomOrder()->limit(5)->get();
	$favourite = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(5)->get();
  @endphp

	
				<div class="col-md-3 col-sm-3">
					<div class="tab-header">
						<!-- Nav tabs -->
<ul class="nav nav-tabs nav-justified" role="tablist">
	<li role="presentation" class="active">
		<a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
		   @if(session()->get('language') == 'bangla') 
		      সর্বশেষ
           @else 
		       Latest
			@endif	
		
		</a>
	</li>
	<li role="presentation" >
		<a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
		  @if(session()->get('language') == 'bangla') 
		     জনপ্রিয়
           @else 
		     Popular
			@endif	
		
		</a>
	</li>
	<li role="presentation" >
		<a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
		   @if(session()->get('language') == 'bangla') 
		      প্রিয়
           @else 
		     Favourite
			@endif
		</a>
		</li>
</ul>

						<!-- Tab panes -->
	<div class="tab-content ">
		<div role="tabpanel" class="tab-pane in active" id="tab21">
			<div class="news-titletab">
				@foreach($latest as $row)
				<div class="news-title-02">
					<h4 class="heading-03"><a href="#">
					   @if(session()->get('language') == 'bangla') 
						    {{ $row->title_bn }}
                         @else 
						    {{ $row->title_en }}
				        @endif
					</a> </h4>
				</div>
				@endforeach
			</div>
		</div>


	<div role="tabpanel" class="tab-pane fade" id="tab22">
		<div class="news-titletab">
              @foreach($popular as $row)
			<div class="news-title-02">
				<h4 class="heading-03"><a href="#">
				  @if(session()->get('language') == 'bangla') 
						{{ $row->title_bn }}
                  @else 
						{{ $row->title_en }}
				  @endif
				</a> </h4>
			</div>
			@endforeach
			
		</div>                                          
	</div>
	<div role="tabpanel" class="tab-pane fade" id="tab23">	
		<div class="news-titletab">
			@foreach($favourite as $row)
			<div class="news-title-02">
				<h4 class="heading-03"><a href="#">
				  @if(session()->get('language') == 'bangla') 
					  {{ $row->title_bn }}
                  @else 
						{{ $row->title_en }}
				  @endif
				</a> </h4>
			</div>
			@endforeach
		</div>						                                          
	</div>
</div>
</div>
                    @php 
					  $prayer = DB::table('prayers')->first();
					@endphp

					<!-- Namaj Times -->
					<div class="cetagory-title-03">
				     	@if(session()->get('language')== 'bangla')
						   নামাজের সময়
	                 	@else
						   Prayer Time 
	                 	@endif
					 </div>
					 <table class="table">
						 <tr>
							 <th>
							 @if(session()->get('language') == 'bangla') ফজর @else Fajr @endif	
							 </th>
							 <th>{{ $prayer->fajr }}</th>
						 </tr>
						 <tr>
							 <th>
							 @if(session()->get('language') == 'bangla') জোহর @else Zuhar  @endif	
							 </th>
							 <th>{{ $prayer->zuhar }}</th>
						 </tr>
						 <tr>
							 <th>
							 @if(session()->get('language') == 'bangla') আসর @else Asar @endif	
							 </th>
							 <th>{{ $prayer->asar }}</th>
						 </tr>
						 <tr>
							 <th>
							 @if(session()->get('language') == 'bangla') মাগরিব @else Maghrib @endif	
							 </th>
							 <th>{{ $prayer->maghrib }}</th>
						 </tr>
						 <tr>
							 <th>
							 @if(session()->get('language') == 'bangla') ইশা @else Isha @endif	
							 </th>
							 <th>{{ $prayer->isha }}</th>
						 </tr>

						 <tr>
							 <th>
							 @if(session()->get('language') == 'bangla') জুম্মাহ @else Jummah @endif	
							 </th>
							 <th>{{ $prayer->jummah }}</th>
						 </tr>
					 </table>
					
					<!-- Namaj Times -->


					<div class="cetagory-title-03">Old News  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="search ">
						</div>
				   </form>


				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04">
				       @if(session()->get('language') == 'bangla') গুরুত্বপূর্ণ ওয়েবসাইট  @else Important Website  @endif 
				   Important Website
					</div>
				   <div class="">
					   @php
					      $website = DB::table('websites')->get();
					   @endphp
					   @foreach($website as $row)
				   	  <div class="news-title-02">
				   		  <h4 class="heading-03"><a href="{{ $row->website_link }}"><i class="fa fa-check" aria-hidden="true"></i>{{ $row->website_name	 }}</a> </h4>
				       </div>
				   	
	                   @endforeach
				   </div>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->
	


	


	


	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title">
					  @if(session()->get('language') == 'bangla') ফটো গ্যালারি
					  @else  Photo Gallery
					  @endif 
				       
					</div>
	@php	
	   $photobig = DB::table('photos')->where('type',1)->orderBy('id','desc')->first();
	   $photosmall = DB::table('photos')->where('type',0)->orderBy('id','desc')->limit(4)->get();
	@endphp

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{ asset($photobig->photo) }}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                            
							 @foreach($photosmall as $row)
	                            <div class="photo_img photo_border active">
	                                <img src="{{ asset($row->photo) }}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    {{ $row->title }}
	                                </div>
	                            </div>
	                          
                             @endforeach

	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> 
				     @if(session()->get('language') == 'bangla') ভিডিও সংগ্রহশালা
					  @else  Video Gallery
					  @endif 
					 </div>

		@php	
	       $videobig = DB::table('videos')->where('type',1)->orderBy('id','desc')->first();
	       $videosmall = DB::table('videos')->where('type',0)->orderBy('id','desc')->limit(3)->get();
	    @endphp

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                       <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $videobig->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="gallery_sec owl-carousel">
                               
							   @foreach($videosmall as $row)
	<div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
   <iframe width="853" height="480" src="https://www.youtube.com/embed/{{ $row->embed_code }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div> 
                               @endforeach
                               
                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->




<script type="text/javascript">
   $(document).ready(function() {
         $('select[name="district_id"]').on('change', function(){
             var district_id = $(this).val();
             if(district_id) {
                 $.ajax({
                     url: "{{  url('/get/subdistrict/') }}/"+district_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        $("#subdistrict_id").empty();
                              $.each(data,function(key,value){
                                  $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_en+'</option>');
                            });
                        
                     },
                    
                 });
             } else {
                 alert('danger');
             }
         });
     });
</script>


@endsection