@extends('admin.header')
@section('title','Show-product')
@section('content-section')

        <section id="main-content">
      <section class="wrapper">

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Advanced Table
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Product Name</th>
                    <th><i class="icon_calendar"></i> Price</th>
                    <th><i class="icon_mail_alt"></i> Category</th>
                    <th><i class="icon_pin_alt"></i> Description</th>
                    <th><i class="icon_mobile"></i> Image</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  @foreach($showproduct as $s)
                  <tr>
                    <td>{{$s->product_name}}</td>
                    <td>{{$s->product_price}}</td>
                    <td>{{$s->category->category_name}}</td>
                    <td style="user-select: none;">{!!$s->product_description!!}</td>
                    <td><img src="{{asset('admin/upload/products')}}/{{$s->product_image}}" width="50"></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="{{route('admin.editproduct',$s->id)}}"><i class="icon_plus_alt2"></i></a>
                        <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                        <a class="btn btn-danger" href="{{route('admin.deleteproduct',$s->id)}}" onclick="return confirm('are you sure')"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
              </table>
            </section>
          </div>
        </div>
    </section>
</section>

@endsection
