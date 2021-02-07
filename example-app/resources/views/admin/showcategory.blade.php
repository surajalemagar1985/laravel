@extends('admin.header')
@section('title','show-category')
@section('content-section')

<section id="main-content">
      <section class="wrapper">

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Category Table
              </header>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Category Name</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
             	@foreach($showcategory as $s)
                  <tr>
                    <td>{{$s->category_name}}</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="#"><i class="icon_plus_alt2"></i></a>
                        <!-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> -->
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
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