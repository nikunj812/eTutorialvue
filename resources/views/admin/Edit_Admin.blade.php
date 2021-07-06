@extends('admin.adminlayout.master')

@section('content')


<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Edit Admin Record</a> </div>
  <h1>Edit Admin Record</h1>
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
          <form action="{{ url('/Update_Admin_Record') }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
           
             <input type="hidden"  name="admin_id" id="id" class="span11" value="{{$alldata->id}}">
               {{ csrf_field() }}
          	<div class="control-group">
              <?php $name = explode(' ',$alldata->name)  ?>
              <label class="control-label">First Name</label>
              <div class="controls">
                <input type="text" placeholder="Enter First Name" name="fname" id="fname" class="span11" value="@if(isset($name[0])){{ $name[0]}}@endif">
               
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Last Name</label>
              <div class="controls">
                <input type="text" placeholder="Enter Last Name" name="lname" id="lname" class="span11" value="@if(isset($name[1])){{ $name[1]}}@endif">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" placeholder=" Enter Email" name="email" id="email" class="span11" value="@if(isset($alldata->email)){{$alldata->email}}@endif">
              </div>
            </div>
 
            <div class="control-group">
              <label class="control-label">Gender</label>
              <div class="controls">
                <label>
                  <input type="radio" name="gender" value="male" @if(isset($alldata->gender)) @if($alldata->gender == 'male')
                  {{'checked'}} @endif @endif />
                  Male</label>
                <label>
                  <input type="radio" name="gender" value="female" 
                  @if(isset($alldata->gender)) @if($alldata->gender == 'female') {{'checked'}} @endif @endif/>
                  Female</label>
              </div>
            </div>

            <div class="control-group">
              <?php $edu = explode('-',$alldata->education) ?>
              <label class="control-label">Education</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="education[]" value="10th" 
                  @if(isset($edu)) @if(in_array('10th',$edu)) {{'checked'}} @endif @endif/>
                  10th</label>
                <label>
                  <input type="checkbox" name="education[]" value="12th"
                  @if(isset($edu)) @if(in_array('12th',$edu)) {{'checked'}} @endif @endif/>
                 12th</label>
                <label>
                  <input type="checkbox" name="education[]" value="Graduation" 
                  @if(isset($edu)) @if(in_array('Graduation',$edu)) {{'checked'}} @endif @endif/>
                   Graduation</label>
              </div>
            </div>

            <?php $city = array('surat','ahemedabad','vadodara','bhavnagar')  ?>
            <div class="control-group">
              <label class="control-label">City</label>
              <div class="controls">
                <select name="city" >
                  <label>--SELECT_CITY--</label>
                  <?php for($i=0;$i<sizeof($city);$i++){ ?>
                  <option value="<?php echo $city[$i] ?>" 
                   @if(isset($alldata->city)) @if($alldata->city == $city[$i]) @endif @endif>
                  	<?php echo $city[$i]  ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Upload Image</label>
              <div class="controls">
                <input type="file" name="image" >
                <img src='{{ url("admin/images/$alldata->image")}}' height="50" width="50" />  
              </div>
            </div>
           
            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="submit" value="Update Admin Data">
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