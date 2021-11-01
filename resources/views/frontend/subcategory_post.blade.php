@extends('frontend.main_master')
@section('content')

		
	<!-- archive_page-start -->
	<section class="single_page">						
		<div class="container-fluid">											
		<div class="row">
			<div class="col-md-12">
				<div class="single_info">
					<span>
						<a href="#"><i class="fa fa-home" aria-hidden="true"></i> /
						</a>  SubCategory			
					</span>				    
				</div>
			</div>
			<div class="col-md-9 col-sm-8">	
              @foreach($subcatpost as $row)			
							
				<div class="archive_post_sec_again">
					<div class="row">
						<div class="col-md-4 col-sm-5">
							<div class="archive_img_again">
								<a href="#"><img src="{{ asset($row->image) }}" alt="Notebook"></a>
							</div>
						</div>
						<div class="col-md-8 col-sm-7">
							<div class="archive_padding_again">
								<div class="archive_heading_01">
									<a href="{{ url('view/post/'.$row->id) }}">
                                       @if(session()->get('language') == 'bangla') 
						                    {{ $row->title_bn }}
				                        @else 
						                    {{ $row->title_en }}
				                       @endif
                                    </a>
								</div>
								<div class="archive_dtails">
                                   @if(session()->get('language') == 'bangla') 
                                       {!! Str::limit($row->details_bn, 350) !!}
				                   @else 
                                      {!! Str::limit($row->details_en, 350) !!}
				                   @endif
								</div>
						<div class="dtails_btn"><a href="{{ url('view/post/'.$row->id) }}">
                                    @if(session()->get('language') == 'bangla') 
                                       আরও পড়ুন..... 
				                    @else 
                                       Read More......
				                    @endif
                                </a>
								</div>
							</div>
						</div>
					</div>
				</div>		
					
				
              @endforeach
											                          
              {{ $subcatpost->links() }}
			</div>
			<div class="col-md-3 col-sm-4">
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
