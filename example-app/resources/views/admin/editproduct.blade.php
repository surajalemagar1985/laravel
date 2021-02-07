@extends('admin.header')
@section('title','editproduct')
@section('content-section')

<section id="main-content">
      <section class="wrapper">
      	<div id="hide">
      @if(Session::has('msg'))
      <div class="alert alert-success">
      	{{Session::get('msg')}}
      </div>
      @endif
      </div>

<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Product
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" method="post" action="{{route('admin.updateproduct',$product->id)}}" enctype="multipart/form-data">
                  @csrf	
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Product Name<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="pname" type="text" required value="{{$product->product_name}}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Price<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="price" type="text" required
                        value="{{$product->product_price}}" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Description<span class="required">*</span></label>
                      <div class="col-lg-10">
                      	<textarea name="description" class="form-control">{{$product->product_description}}</textarea>
                       </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Image<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="image" type="file"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">category<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select name="category" class="form-control">
                          <option value="{{$product->category->id}}">{{$product->category->category_name}}</option>
                        	@foreach($show as $s)
                        		<option value="{{$s->id}}">
                        			{{$s->category_name}}
                        		</option>
                        	@endforeach
                        </select>
                      </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Add</button>
                        <button class="btn btn-default" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            </section>
          </div>
        </div>
    </section>
</section>


@endsection