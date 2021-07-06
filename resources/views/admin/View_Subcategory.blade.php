@extends('admin.adminlayout.master')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Sucategory Record</a>
    </div>
    <h1>View Subcategory Record</h1>
  </div>
       
  <div class="container-fluid">
    <hr>

    <div class="row-fluid">
      <div class="span12">

         <form method="post" action="{{ url('/searchSubcategory') }}">
              {{ csrf_field() }}
             <div class="control-group col-md-8">
              <div class="controls col-md-4">
                <input type="text" name="search" id="search" class="span12" placeholder="Search....">
              </div>
              <br><br>
              <div class="controls col-md-2">
               <input type="submit"  name="submit" value="submit">
              </div>
              </div>
           
          </form>
         <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>View Category Record</h5>
            <span class="label label-info">Featured</span>
          </div>
          <div class="widget-content ">
          	@if(session('msg'))
          	 <div class="alert alert-success">
               {{ session('msg')}}
             </div>
          	@endif       
            <form method="post" action="{{ url('/MultipleSubcatDelete')}}">
              {{ csrf_field()}}
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="select_all" /><input type="submit" value="DELETE ALL" name="submit"/></th>
                  <th>Category_name</th>
                  <th>SubCategory_name</th>
                  <th>SubCategory_status</th>
                  <th>Created_at</th>
                  <th>Update_at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($subcat_data as $val)
                <tr>
                  <td><input type="checkbox" name="DataDelete[]" class="checkbox" value="{{ $val->subcategory_id }}"/></td>
                  <td>{{ $val->subcat_name }}</td>
                  <td>{{ $val->subcategory_name }}</td>
                  <td>
                    @if($val->subcategory_status == 0)
                       <a href='javascript:active_subcategory({{$val->subcategory_id}})' class='btn btn-danger'>Deactive</a>
                        @else
                       <a href='javascript:deactive_subcategory({{$val->subcategory_id}})' class='btn btn-success'>Active</a>
                    @endif
                    
                  </td>
                  <td>{{ $val->created_at }}</td>
                  <td>{{ $val->updated_at }}</td>
                  <td><a href='{{url("/Delete_Subcategory/$val->subcategory_id")}}'><i class="icon-trash"></i></a> || <a href='{{url("/Edit_Subcategory/$val->subcategory_id")}}'><i class="icon-edit"></i></a> </td>
                </tr>
                 @endforeach
                 <tr>
                  <td colspan="9">
                    {{ $subcat_data->links() }}
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
 
  <script type="text/javascript">
    document.getElementById('select_all').onclick = function()
    {
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');
      for(var checkbox of checkboxes){
        checkbox.checked = this.checked;
      }
    }
    
  </script>

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

<script>
  function active_subcategory(id)
  {
    var con = confirm('Are you Sure to Change Status');
    //alert(con);
    if(con)
    {
      
      $.ajax({
        type:'GET',
        url:"ActiveSubstatus/"+id, 
        data:{ "_token": $("#token").val() },
        success:function(response)
        {
            if(response == 1)
            {
              // window.location = "/View_Subcategory";
              window.history.back();
                    location.reload();
            }
        }
      });
    }
    
  }

  function deactive_subcategory(id)
  {
    var con = confirm('Are you Sure to Change Status');
    //alert(con);
    if(con)
    {
      $.ajax({
        type:'GET',
        url:"DeactiveSubstatus/"+id, 
        data:{ "_token": $("#token").val() },
        success:function(response)
        {
            if(response == 1)
            {
              // window.location = "/View_Subcategory";
              window.history.back();
              location.reload();
            }
        }
      });
    }
   
  }

</script>



               