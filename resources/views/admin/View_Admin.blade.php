@extends('admin.adminlayout.master')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">View Admin Record</a>
    </div>
    <h1>View Admin Record</h1>
  </div>
  @if(session('msg'))
     <div class="alert alert-success">{{session('msg')}}</div>
  @endif

           
  <div class="container-fluid">
    <hr>

    <div class="row-fluid">
      <div class="span12">

         <form method="post" action="{{ url('/searchAdmin') }}">
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
            <h5>View Admin Record</h5>
            <span class="label label-info">Featured</span>
          </div>
          <div class="widget-content ">
          	@if(session('msg'))
          	 <div class="alert alert-success">
               {{ session('msg')}}
             </div>
          	@endif       
            <form method="post" action="{{ url('/MultipleDelete')}}">
              {{ csrf_field()}}
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><input type="checkbox" id="select_all" /><input type="submit" value="DELETE ALL" name="submit"/></th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Education</th>
                  <th>city</th>
                  <th>Image</th>
                  <th>Create Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($allData as $val)
                <tr>
                  <td><input type="checkbox" name="DataDelete[]" class="checkbox" value="{{ $val->id }}"/></td>
                  <td>{{ $val->name }}</td>
                  <td>{{ $val->email }}</td>
                  <td>{{ $val->gender }}</td>
                  <td>{{ $val->education }}</td>
                  <td>{{ $val->city }}</td>
                  <td><img src="admin/images/{{ $val->image}}" alt="Admin" width="100" height="100"></td>
                  <td>{{ $val->created_at }}</td>
                  <td><a href='{{url("/Delete_Admin/$val->id")}}'><i class="icon-trash"></i></a> || <a href='{{url("/Edit_Admin/$val->id")}}'><i class="icon-edit"></i></a> </td>
                </tr>
                 @endforeach
                 <tr>
                  <td colspan="9">
                    {{ $allData->links() }}
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





               