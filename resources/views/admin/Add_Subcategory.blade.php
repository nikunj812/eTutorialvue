@extends('admin.adminlayout.master')

@section('content')


<div id="content">
<div id="content-header">a
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Add SubCategory Record</a> </div>
  <h1>Add SubCategory Record</h1>
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
          <form action="{{ url('/Add_Subcategory_Record') }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
             {{ csrf_field() }}
          	
            <div class="control-group">
              <label class="control-label">CATEGORY</label>
              <div class="controls">
                <select name="category" >
                  <label>--SELECT_CATEGORY--</label>
                  @foreach($alldata as $val)
                  <option value="{{ $val->category_name}}">
                  	{{ $val->category_name}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">SubCategory Name</label>
              <div class="controls">
                <input type="text" placeholder="Subcategory Name" name="Subcategory" id="Subcategory" class="span11">
              </div>
            </div>

            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="submit" value="Insert SubCategroy">
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