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
                    <h4 class="card-title">Update SubCategory</h4>

                <form class="forms-sample" method="POST" action="{{ route('update.subcategory',$subcategory->id) }}">
                     @csrf

                     <div class="form-group">
                        <label for="exampleInputUsername1">SubCategogry English</label>
                        <input type="text" class="form-control" name="subcategory_en" value="{{ $subcategory->subcategory_en }}" placeholder="Subcategory English"  id="exampleInputEmail1">
                        @error('subcategory_en') 
	                        <span class="text-danger">{{ $message }}</span>
	                    @enderror
                      </div>
                      

                      <div class="form-group">
                        <label for="exampleInputEmail1">SubCategogry Bangla</label>
                        <input type="text" name="subcategory_bn" value="{{ $subcategory->subcategory_bn }}" class="form-control" id="exampleInputEmail1" placeholder="Subcategory Bangla">
                        @error('subcategory_bn') 
	                        <span class="text-danger">{{ $message }}</span>
	                    @enderror
                      </div>


                     
                      <div class="form-group">
                        <label for="exampleFormControlSelect2">Select Category</label>
			                <div class="controls">
			                    <select name="category_id"  class="form-control">

				                     <option value="" selected="" disabled="">Select Category</option>

                                     @foreach($category as $row)
                                       <option value="{{ $row->id }}" {{ $row->id == $subcategory->category_id ? 'selected': ''}}>{{ $row->category_en }} | {{ $row->category_bn }}</option>
				                    @endforeach

			                     </select>

                                @error('category_id') 
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