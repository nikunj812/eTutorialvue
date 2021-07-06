@extends('admin.adminlayout.master')

@section('content')


<div id="content">
<div id="content-header">
  
  <h1>Add Category Record</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
    	@if(session('msg'))
           <div class="alert alert-success">
           	  {{ Session('msg') }}
           </div>
    	@endif
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Form Elements</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="{{ url('/Add_Category_Record') }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
            
             {{ csrf_field() }}
          	<div class="control-group">
              <label class="control-label">Category Name</label>
              <div class="controls">
                <input type="text" placeholder="Add Category Name" name="category" id="categroy" class="span11">
              </div>
            </div>

            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="submit" value="Insert Category">
            </div>
          </form>
        </div>
      </div>
      </div>
    </div>
  </div>
  
  </div>
</div></div>
</div>

@endsection