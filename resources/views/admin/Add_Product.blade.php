@extends('admin.adminlayout.master')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="tip-bottom">Form elements</a> <a href="#" class="current">Add Product Record</a> </div>
  <h1>Add Product Record</h1>
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
          <form action="{{ url('/Add_Product_Record') }}"  method="post" enctype="multipart/form-data" class="form-horizontal">
             {{ csrf_field() }}
          	
             <div class="control-group">
              <label class="control-label">category</label>
              <div class="controls">
                <select name="product_cat_id" id="product_cat_id" onchange="return get_subcat_record()" >
                  <option>--SELECT_CATEGROY--</option>
                  @foreach($alldata as $val)
                  <option value="{{ $val->category_name}}">
                    {{ $val->category_name}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>

             <div class="control-group">
              <label class="control-label">Subcategory</label>
              <div class="controls">
                <select name="product_sub_id" id="product_sub_id" >
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Book Name</label>
              <div class="controls">
                <input type="text" placeholder="Enter Product Name" name="product_name" id="product_name" class="span11">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Book Description</label>
              <div class="controls">
                <textarea type="text" placeholder="Enter Product description" name="product_desc" id="product_desc" class="span11" rows="5"></textarea>
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Upload Book</label>
              <div class="controls">
                <input type="file" name="product_file" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Upload Product Image</label>
              <div class="controls">
                <input type="file" name="image" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Upload Extra Image</label>
              <div class="controls">
                <input type="file" name="mimage[]" multiple=''/>
              </div>
            </div>
            
            <div class="form-actions">
              <input type="submit" class="btn btn-success" name="submit" value="Insert Product Category">
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


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script type="text/javascript">
  
  function get_subcat_record()
  {
    var cat_id = $("#product_cat_id").val();
    //alert(cat_id);
    $.ajax({
      type:"POST",
      url:"/get_subcat_record",    //change name to Extra categoey
      data:{ 'cat_id' : cat_id, "_token": "{{ csrf_token() }}" },
      success:function(response){
        $("#product_sub_id").html(response);
      }
    });
  }

</script>