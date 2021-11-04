@extends('admin.admin_master')
@section('admin')



<div class="content-wrapper">
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card corona-gradient-card">
                  <div class="card-body py-0 px-0 px-sm-3">
                    <div class="row align-items-center">
                      <div class="col-4 col-sm-3 col-xl-2">
                        <img src="{{asset('backend/assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                      </div>
                      <div class="col-5 col-sm-7 col-xl-8 p-0">
                        <h4 class="mb-1 mb-sm-0">Welcome to Easy News </h4>
                        
                      </div>
                      <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                        <span>
        <a href=" {{ url('/') }} " target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Vist Fontend ? </a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Update Ads</h4>

                <form class="forms-sample" method="POST" action="{{ route('update.ads',$ads->id) }}"  enctype="multipart/form-data">
                     @csrf

                     <div class="form-group">
                        <label for="exampleInputUsername1">Ads Link</label>
                        <input type="text" class="form-control" name="link" value="{{ $ads->link}}" id="exampleInputEmail1">
                        @error('link') 
	                        <span class="text-danger">{{ $message }}</span>
	                    @enderror
                      </div>

                      <div class="row">
                       <div class="form-group col-md-6">
                         <label for="exampleFormControlFile1">Image Upload</label>
                         <div class="controls">
                             <input type="file" name="adds" class="form-control" onChange="mainThamUrl(this)" required=""> 
                    
                             @error('adds') 
	                           <span class="text-danger">{{ $message }}</span>
	                          @enderror 
                            <img src="" id="mainThmb">
                          </div>

                        </div> 

                       <div class="form-group col-md-6">
                         <label for="exampleInputName1">Old Ads</label>
                         <img src="{{ URL::to($ads->adds) }}" style="width: 70px; height: 50px;">
                         <input type="hidden" name="oldads" value="{{ $ads->adds }}">
                       
                        </div>
                     
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Ads Type</label>
			                <select name="type"  class="form-control">
                                <option value="1" >Horizontal Ads</option>
                                <option value="2" >Vertical Ads</option>
			                 </select>
		            </div>

                
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
                      
                </form>
                  </div>
                </div>
              </div>



<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
    
</script>



@endsection