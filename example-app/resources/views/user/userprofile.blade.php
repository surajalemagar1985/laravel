@extends('user.layouts.header')
@section('title',$show->user_name)
@section('content-section')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>User Details</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
       <center> <h1 class="portfolio-title,h1">{{$show->user_name}}</h1></center>
        <div class="row">

          <div class="col-lg-8" data-aos="fade-right">
            @if($show->profiles()->count()==0)
              <img src="{{asset('user/image/avatar.png')}}" class="img-fluid" alt="">
              <button class="btn btn-info"> <a href="#staticBackdropProfile" data-bs-toggle="modal" data-bs-target="#staticBackdropProfile">Complete Profile</a></button>
            @else
            <img src="{{asset('user/upload/profileimage')}}/{{$show->profiles->image}}" class="img-fluid" alt="">
            <button class="btn btn-info"> <a href="{{route('editprofile',$show->id)}}">Update Profile</a></button>
            @endif
              
              
            
          </div>

          <div class="col-lg-4 portfolio-info" data-aos="fade-left">
            <h3>User information</h3>
            <ul>
              <li><strong>Fullname</strong>:{{$show->user_name}}</li>
              <li><strong>Email</strong>: {{$show->user_email}}</li>
              <li><strong>Gender</strong>: {{$show->gender}}</li>
               @if($show->profiles()->count()!=0)
                <li><strong>Address</strong>: {{$show->profiles->address}}</li>
                <li><strong>Birth date</strong>: {{$show->profiles->dob}}</li>
                <li><strong>Contact</strong>: {{$show->profiles->phone}}</li>
               @endif
            </ul>

           
          </div>

        </div>

      </div>

    </section><!-- End Portfolio Details Section -->

  </main>


<div class="modal  fade" id="staticBackdropProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      

         <div class="modal-header">
        <!-- <h5 class="modal-title" id="staticBackdropLabel">Login Form</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	 @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
        @endif
    <form action="{{route('userprofileupdate')}}" method="post" enctype="multipart/form-data">
          @csrf

          
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Address</label>
      <input type="text" name="address" class="form-control">
     @if($errors->has('address'))
     <div class="alert alert-danger">
    	<strong>{{$errors->first('address')}}</strong>
     </div>
     @endif
   </div>
  <input type="hidden" name="user_id" value="{{Auth::guard('myweb')->user()->id}}">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control"> 
    @if($errors->has('phone'))
    <div class="alert alert-danger">
    	<strong>{{$errors->first('phone')}}</strong>
    </div>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control">
    @if($errors->has('dob'))
    <div class="alert alert-danger">
    	<strong>{{$errors->first('dob')}}</strong>
    </div>
    @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
    <input type="file" name="image" class="form-control">
    @if($errors->has('image'))
    <div class="alert alert-danger">
    	<strong>{{$errors->first('image')}}</strong>
    </div>
    @endif
  </div>
 
  <!-- <button type="button" class="btn btn-success">login</button> -->
  <input type="submit" name="login" value="Save" class="btn btn-success">
</form>
      
      </div>
    </div>
  </div>
</div>



<div class="modal  fade" id="staticBackdropProfileUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      

         <div class="modal-header">
        <!-- <h5 class="modal-title" id="staticBackdropLabel">Login Form</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	 @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
        @endif
     <form action="" method="post" enctype="multipart/form-data">
          @csrf

           <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input type="text" name="fname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
      </div>               

                        <div class="mb-3">
    <label for="exampleInputEmail1">Gender</label> &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="male">Male &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="Female">Female &nbsp; &nbsp;
    <input type="radio" class="form-check-input" name="gender" value="Others">Others
     
                      
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" name="address" class="form-control">
  </div>
  <input type="hidden" name="user_id" value="{{Auth::guard('myweb')->user()->id}}">


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="number" name="phone" class="form-control"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control">    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
    <input type="file" name="image" class="form-control">    
  </div>
  <input type="submit" name="login" value="Change" class="btn btn-success">
</form>
      
      </div>
    </div>
  </div>
</div>
@endsection