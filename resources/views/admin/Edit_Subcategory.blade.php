@extends('admin.adminlayout.master')

@section('content')


<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Edit SubCategory Record</a> </div>
  <h1>Edit SubCategory Record</h1>
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
          <form action="{{ url('/Update_Subcategroy_Record') }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
           
             <input type="hidden"  name="subcategory_id" id="id" class="span11" value="{{$alldata->subcategory_id}}">
               {{ csrf_field() }}
          
            <div class="control-group">
              <label class="control-label">category</label>
              <div class="controls">
                <select name="subcat_name" >
                  <label>--SELECT_Category--</label>
              
                  @foreach($catdata as $val)
                  <option value="{{ $val->category_name }}" @if($val->category_name == $alldata->subcat_name) {{'selected'}} @endif>
                    {{ $val->category_name}}
                  </option>
                  @endforeach
               
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Subcategory</label>
              <div class="controls">
                <input type="text"  name="subcategory_name" id="subcategory_name" class="span11" value="@if(isset($alldata->subcategory_name)){{$alldata->subcategory_name}}@endif">
              </div>
            </div>
           
            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="submit" value="Update Subcategory Data">
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