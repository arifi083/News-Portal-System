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
                    <h4 class="card-title">Update SubDistrict</h4>

                <form class="forms-sample" method="POST" action="{{ route('update.subdistrict',$subdistrict->id) }}">
                     @csrf

                     <div class="form-group">
                         <label for="exampleInputUsername1">SubDistrict English</label>
                         <input type="text" class="form-control" name="subdistrict_en" value="{{ $subdistrict->subdistrict_en }}" placeholder="SubDistrict English"  id="exampleInputEmail1">
                          @error('subdistrict_en') 
	                         <span class="text-danger">{{ $message }}</span>
	                      @enderror
                      </div>


                      <div class="form-group">
                        <label for="exampleInputEmail1">SubDistrict Bangla</label>
                        <input type="text" name="subdistrict_bn" value="{{ $subdistrict->subdistrict_bn }}"  class="form-control" id="exampleInputEmail1" placeholder="SubDistrict Bangla">
                        @error('subdistrict_bn') 
	                        <span class="text-danger">{{ $message }}</span>
	                      @enderror
                      </div>

                     
                      <div class="form-group">
                         <label for="exampleFormControlSelect2">Select District</label>
			                <div class="controls">
			                    <select name="district_id"  class="form-control">

				                    <option value="" selected="" disabled="">Select District</option>

                                   @foreach($district as $row)
                                      <option value="{{ $row->id }}"
                                         <?php if($row->id == $subdistrict->district_id) echo "selected"; ?>
                                    >{{ $row->district_en }} | {{ $row->district_bn }}</option>
				                    @endforeach

			                    </select>

                              @error('district_id') 
	                            <span class="text-danger">{{ $message }}</span>
	                           @enderror 

		                    </div>
		              </div>
                      
                      <button type="submit" class="btn btn-primary mr-2">Update</button>
                      
                </form>
                  </div>
                </div>
              </div>



@endsection