@extends('user.layouts.header')
@section('title','Ecommerce-SearchResult')
@section('content-section')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Search</h2>
          <ol>
            
            <li>Result</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    


    <section id="services" class="services">
      <div class="container">

        @if(Count($show)==0)
        <div class="alert alert-warning">
         <center><h4> {{'Product not available' }}</h4></center>
        </div>
        @else


        <div class="row">
          @foreach($show as $s)
          <div class="col-lg-4 col-md-6">
            <div class="" data-aos="fade-up">
            <center>  <div><img src="{{asset('admin/upload/products')}}/{{$s->product_image}}" height="150" width="150" class="rounded-circle"></div></center>
          <center>    <h4 class="title"><a href="{{route('singleproduct',$s->id)}}">{{$s->product_name}}</a></h4></center>
             <center> <p class="description">Price: Rs.  {{$s->product_price}}</p></center>
            </div>
          </div>
          @endforeach
          @endif
          
        </div>

      </div>
    </section><!-- End Services Section -->


  </main>


@endsection