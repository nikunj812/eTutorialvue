@extends('admin.adminlayout.master')

@section('content')


<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Edit Category Record</a> </div>
  <h1>Edit Category Record</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
       
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Form Elements</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="{{ url('/Update_Categroy_Record') }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
           
             <input type="hidden"  name="category_id" id="id" class="span11" value="{{$alldata->category_id}}">
               {{ csrf_field() }}
            
            <div class="control-group">
              <label class="control-label">Category</label>
              <div class="controls">
                <input type="text"  name="category_name" id="category_name" class="span11" value="@if(isset($alldata->category_name)){{$alldata->category_name}}@endif">
              </div>
            </div>
           
            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="submit" value="Update Category Data">
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