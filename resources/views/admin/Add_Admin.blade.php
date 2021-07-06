@extends('admin.adminlayout.master')

@section('content')


<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Add Admin Record</a> </div>
  <h1>Add Admin Record</h1>
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
          <form action="{{ url('/Add_Admin_Record') }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
             {{ csrf_field() }}
          	<div class="control-group">
              <label class="control-label">First Name</label>
              <div class="controls">
                <input type="text" placeholder="Enter First Name" name="fname" id="fname" class="span11">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Last Name</label>
              <div class="controls">
                <input type="text" placeholder="Enter Last Name" name="lname" id="lname" class="span11">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Email</label>
              <div class="controls">
                <input type="text" placeholder=" Enter Email" name="email" id="email" class="span11">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Password</label>
              <div class="controls">
                <input type="password" placeholder="Enter Password" name="password" id="password" class="span11">
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Gender</label>
              <div class="controls">
                <label>
                  <input type="radio" name="gender" value="male"/>
                  Male</label>
                <label>
                  <input type="radio" name="gender" value="female"/>
                  Female</label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Education</label>
              <div class="controls">
                <label>
                  <input type="checkbox" name="education[]" value="10th" />
                  10th</label>
                <label>
                  <input type="checkbox" name="education[]" value="12th" />
                  12th</label>
                <label>
                  <input type="checkbox" name="education[]" value="Graduation" />
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
                  <option value="<?php echo $city[$i]  ?>">
                  	<?php echo $city[$i]  ?>
                  </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Upload Image</label>
              <div class="controls">
                <input type="file" name="image" />
              </div>
            </div>
           
            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="submit" value="Insert Admin">
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