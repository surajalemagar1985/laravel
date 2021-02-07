@extends('admin.header')
@section('title','addcategory')
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
                Add Category
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" method="post" action="{{route('admin.savecategory')}}">
                  	@csrf	
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Category<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control" id="cname" name="category" type="text" required />
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
<script>
	function hidemsg(){
		document.getElementById("hide").style ='display:none';
	}
	setTimeout(hidemsg,3000);
</script>

@endsection