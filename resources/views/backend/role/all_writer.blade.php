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

 



<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Writer List</h4>


              <div class="template-demo">
  <a href="{{ route('add.writer')  }}"><button type="button" class="btn btn-primary btn-fw" style="float: right;">Add Writer</button></a>	              	
              </div>
                    
       
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th>Name</th>
                            <th> Role</th>
                            <th> Action </th>
                             
                          </tr>
                        </thead>
                        <tbody>
              @php($i=1)
           @foreach($writer as $row)
      <tr>
        <td> {{ $i++}} </td>
        <td> {{ $row->name }} </td>
         
        <td>
             @if($row->category == 1)
              <span class="badge btn-primary">Category</span>
             @else
             @endif

             @if($row->district == 1)
              <span class="badge btn-success">District</span>
             @else
             @endif

             @if($row->post == 1)
              <span class="badge btn-info">Post</span>
             @else
             @endif

             @if($row->setting == 1)
              <span class="badge btn-primary">Setting</span>
             @else
             @endif

             @if($row->website == 1)
              <span class="badge btn-danger">Website</span>
             @else
             @endif

             @if($row->gallery == 1)
              <span class="badge btn-success">Gallery</span>
             @else
             @endif

             @if($row->ads == 1)
              <span class="badge btn-info">Ads</span>
             @else
             @endif

             @if($row->role == 1)
              <span class="badge btn-danger">Role</span>
             @else
             @endif

            
        </td>
        <td> 
    
           <a href="{{ route('writer.edit',$row->id) }}" class="btn btn-primary">Edit</a>
           <a href="{{ route('category.delete',$row->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a>
      </tr>
      @endforeach
                           
                        </tbody>
                      </table>
                     
                    </div>
                  </div>
                </div>
              </div>


 

@endsection


