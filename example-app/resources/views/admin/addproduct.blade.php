@extends('admin.header')
@section('title','addproduct')
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
                Add Product
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" method="post" action="{{route('admin.storeproduct')}}" enctype="multipart/form-data">
                  @csrf	
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Product Name<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="pname" type="text" value="{{old('pname')}}" />
                        @if($errors->has('pname'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('pname')}}</strong>
                        </div>
                     @endif

                      </div>

                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Price<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="price" type="text"price value="{{old('price')}}" />
                        @if($errors->has('price'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('price')}}</strong>
                        </div>
                        @endif
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Description<span class="required">*</span></label>
                      <div class="col-lg-10">
                      	<textarea name="description" id="editor" class="form-control">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('description')}}</strong>
                        </div>
                        @endif
                       </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Image<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="image" type="file" value="{{old('image')}}" />
                        @if($errors->has('image'))
                        <div class="alert alert-danger">
                          <strong>{{$errors->first('image')}}</strong>
                        </div>
                        @endif
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">category<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select name="category" class="form-control">
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