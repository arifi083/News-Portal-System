@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
                    <h4 class="card-title">Add Photo</h4>

                <form class="forms-sample" method="POST" action="{{ route('photo.store') }}" enctype="multipart/form-data">
                     @csrf

                      <div class="form-group">
                        <label for="exampleInputUsername1">Photo Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Photo Title"  id="exampleInputEmail1">
                        @error('title') 
	                        <span class="text-danger">{{ $message }}</span>
	                    @enderror
                      </div>
                      
                       
                      <div class="form-group">
                         <label for="exampleFormControlFile1">Photo Upload</label>
                         <div class="controls">
                             <input type="file" name="photo" class="form-control" onChange="mainThamUrl(this)" required=""> 
                    
                             @error('photo') 
	                           <span class="text-danger">{{ $message }}</span>
	                         @enderror 
                            <img src="" id="mainThmb">
                          </div>

                        </div>

                        
                      <div class="form-group">
                         <label for="exampleFormControlSelect2">Photo Type</label>
			                   <select name="type"  class="form-control">
                                   <option value="1" >Big Photo</option>
                                   <option value="0" >Small Photo</option>
			                     </select>
      
		                  </div>


                    
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      
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