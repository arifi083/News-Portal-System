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
                    <h4 class="card-title">Update photo</h4>

                <form class="forms-sample" method="POST" action="{{ route('update.photo',$photo->id) }}"  enctype="multipart/form-data">
                     @csrf

                     <div class="form-group">
                        <label for="exampleInputUsername1">Photo Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $photo->title }}" id="exampleInputEmail1">
                        @error('title') 
	                        <span class="text-danger">{{ $message }}</span>
	                    @enderror
                      </div>

                    <div class="row">
                       <div class="form-group col-md-6">
                          <label for="exampleInputName1">News Image Upload</label>
                          <input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
                       </div>

                       <div class="form-group col-md-6">
                         <label for="exampleInputName1">Old Image</label>
                         <img src="{{ URL::to($photo->photo)  }}" style="width: 70px; height: 50px;">
                         <input type="hidden" name="oldphoto" value="{{ $photo->photo }}">
                       
                        </div>
                     
                    </div>
                        
                        <div class="form-group">
                          <label for="exampleFormControlSelect2">Photo Type</label>
			                  <select name="type"  class="form-control">
                                 <option value="1" >Big Photo</option>
                                  <option value="0" >Small Photo</option>
			                   </select>
      
		                  </div>
                      

                      
                      
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
                      
                </form>
                  </div>
                </div>
              </div>



@endsection