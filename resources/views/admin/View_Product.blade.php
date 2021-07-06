@extends('admin.adminLayout.master')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Book Record</a> </div>
    <h1>View Book Record</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        @if(Session('msg'))
        <div class="alert alert-success">
          {{ Session('msg') }}
        </div>
        @endif

        @if(Session('msg_da'))
        <div class="alert alert-danger">
          {{ Session('msg_da') }}
        </div>
        @endif

        <form method="post" action="{{ url('/searchingproduct')}}">
          {{ csrf_field() }}
          <div class="control-group row">
            <div class="col-md-6 d-flex">
              <div class="controls col-md-6">
                <input type="text" name="search" class="span12" />
              </div>
              <div class="controls col-md-3">
                <input type="submit" name="submit" value="submit" />
              </div>
            </div>
            <div class="col-md-6">

            </div>
          </div>
        </form>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon">
            
            </span>
            <h5>View Brand Record</h5>
          </div>
          <div class="widget-content nopadding">

            <form method="post" action="{{ url('/deleteMultipleProduct') }}">
              {{ csrf_field() }}

              <table class="table table-bordered table-striped with-check" style="table-layout:fixed; width:100%; word-wrap: break-word;">
                <thead>
                  <tr>
                  <th><input type="checkbox" id="select_all" name="title-checkbox" /> <input type="submit" name="submit" value="DELETE" style="width:10px;" /></th>
                  <th>Book_Category_name</th>
                  <th>Book_SubCategory_name</th>
                  <th>Book_name</th>
                  <th>Book_Desc</th>
                  <th>Book_Image</th>
                  <!-- <th>Book_Images</th> -->
                  <th>Book_status</th>
                  <th>Created_at</th>
                  <th>Update_at</th>
                  <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($productdata as $val)
                  <tr>
                  <td><input type="checkbox" name="DataDelete[]" class="checkbox" value="{{ $val->product_id }}"/></td>
                  <td>{{ $val->product_cat_name }}</td>
                  <td>{{ $val->product_sub_name }}</td>
                  <td>{{ $val->product_name }}</td>
                  <td>{{ $val->product_desc }}</td>
                  <td><img src="admin/images/{{ $val->product_image}}" alt="Admin" width="100" height="100"></td>
                  <!-- <td>@foreach( explode(',',$val->product_mimage) as $mi)
                  <img src="admin/mimages/{{ $mi }}" alt="Admin" width="50" height="50">
                  @endforeach</td> -->
                  <td style="width:120px">
                    @if($val->product_status == 0)
                       <a href='javascript:active_productcategory({{$val->product_id}})' class='btn btn-danger' style="width:70px">Deactive</a>
                        @else
                       <a href='javascript:deactive_productcategory({{$val->product_id}})' class='btn btn-success'>Active</a>
                    @endif
                    
                  </td>
                  <td>{{ $val->created_at }}</td>
                  <td>{{ $val->updated_at }}</td>
                  <td><a href='{{url("/Delete_Productcategory/$val->product_id")}}'><i class="icon-trash"></i></a> || <a href='{{url("/Edit_Productcategory/$val->product_id")}}'><i class="icon-edit"></i></a> </td>
                </tr>
                 @endforeach
                
                  <tr>
                    <td colspan="9">
                      {!! $productdata->links() !!}
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('select_all').onclick = function() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  }
</script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<script>
  
  function active_productcategory(id)
  {
    var con = confirm("Are you sure to change status ?");
    if(con)
    {
      $.ajax({
        type : "get",
        url : "Active_product/"+id,
        data : {
          "_token": $('#token').val() 
        },
        success:function(response)
        {
          if(response == 1)
          {
            // window.location = "/View_Product";
            window.history.back();
            location.reload();
          }
        }
      });
    }
    else
    {
      alert("There no changes !!");
      return false;
    }
  }

  function deactive_productcategory(id)
  {
    var con = confirm("Are you sure to change status ?");
    if(con)
    {
      $.ajax({
        type : "get",
        url : "Deactive_product/"+id,
        data : {
          "_token": $('#token').val() 
        },
        success:function(response)
        {
          if(response == 1)
          {
            // window.location = "/View_Product";
            window.history.back();
            location.reload();
          }
        }
      });
    }
    else
    {
      alert("There no changes !!");
      return false;
    }
  }

</script>

@endsection