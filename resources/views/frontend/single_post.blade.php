@extends('frontend.main_master')
@section('content')


<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
						<li><a href="#">
                        @if(session()->get('language') == 'bangla') 
						  {{ $post->category_bn }}
				        @else 
						   {{ $post->category_en }}
				        @endif
                        </a></li>
						<li><a href="#">
                        @if(session()->get('language') == 'bangla') 
						  {{ $post->subcategory_bn }}
				        @else 
						   {{ $post->subcategory_en }}
				        @endif
                        </a></li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
                         @if(session()->get('language') == 'bangla') 
						   {{ $post->title_bn }}
				        @else 
						   {{ $post->title_en }}
				        @endif
                        </h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
						 
						 
						 <li>{{ $post->name }}</li>     <li><i class="fa fa-clock-o"></i>{{ $post->post_date }}</li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
							
                        
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">

					<img src="{{ asset($post->image) }}" alt="" /> 
			<!-- ShareThis BEGIN --><div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
			<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v12.0" nonce="F6uCXTjO"></script>
<div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="10"></div>

                     <br><br>
					<h4 class="caption">
                        @if(session()->get('language') == 'bangla') 
						   {{ $post->title_bn }}
				        @else 
						   {{ $post->title_en }}
				        @endif
                    </h4>
					<p>
                       @if(session()->get('language') == 'bangla') 
						   {!! $post->details_bn !!}
				        @else 
						   {!! $post->details_en !!}
				        @endif
                   </p>
				</div>
				<!-- ********* -->
                <br><br>
    
				<div class="row">
					<div class="col-md-12"><h2 class="heading">
                       @if(session()->get('language') == 'bangla') 
                         সম্পর্কিত খবর
				        @else 
                          Related News
				        @endif
                       
                    </h2></div>

                     @foreach($reletedNews as $row)
					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm">
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
			</div>



			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->

 @php
    $latest = DB::table('posts')->orderBy('id','desc')->limit(5)->get();
	$popular = DB::table('posts')->orderBy('id','ASC')->inRandomOrder()->limit(5)->get();
	$favourite = DB::table('posts')->orderBy('id','desc')->inRandomOrder()->limit(5)->get();
  @endphp


				<div class="tab-header">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                        @if(session()->get('language') == 'bangla') 
		                    সর্বশেষ
                        @else 
		                   Latest
			            @endif	
                        </a>
                    </li>
						<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                        @if(session()->get('language') == 'bangla') 
		                    জনপ্রিয়
                        @else 
		                  Popular
			            @endif	
                        </a>
                    </li>
						<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
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
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{ asset('frontend/assets/img/add_01.jpg') }}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->
			</div>
		  </div>
		</div>
	</section>

@endsection
	