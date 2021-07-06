<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/fullcalendar.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/matrix-media.css') }}" />
<link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Admin</a></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle" style="padding:6px;"><i class="icon icon-user"></i>  <span class="text">Welcome <button style="color:#87ceeb">{{session('loginData')->name}}</button></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href=" {{url('/LogOutAdmin')}}"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    
    <!-- <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li> -->
  </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->

<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{ url('/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    
   <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Admin</span></a>
      <ul>
        <li><a href="{{ url('/Add_Admin')}}">Add_Admin</a></li>
        <li><a href="{{ url('/View_Admin')}}"><i class="icon icon-th"></i> <span>View_Admin</span></a></li>
      </ul>
    </li>


    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Category</span></a>
      <ul>
        <li><a href="{{ url('/Add_Category')}}">Add_Category</a></li>
        <li><a href="{{ url('/View_Category')}}"><i class="icon icon-th"></i> <span>View_Category</span></a></li>
      </ul>
    </li>


    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Subcategory</span></a>
      <ul>
        <li><a href="{{ url('/Add_Subcategory')}}">Add_Subcategory</a></li>
        <li><a href="{{ url('/View_Subcategory')}}"><i class="icon icon-th"></i> <span>View_Subcategory</span></a></li>
      </ul>
    </li>


    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Book</span></a>
      <ul>
        <li><a href="{{ url('/Add_Product')}}">Add_Book</a></li>
        <li><a href="{{ url('/View_Product')}}"><i class="icon icon-th"></i> <span>View_Book</span></a></li>
      </ul>
    </li>

    </li>
  </ul>
</div>
<!--sidebar-menu-->




@yield('content');





<!--Footer-part-->

<div class="row-fluid">
 
</div>

<!--end-Footer-part-->

<script src="{{ asset('js/excanvas.min.js') }}"></script> 
<script src="{{ asset('js/jquery.min.js') }}"></script> 
<script src="{{ asset('js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('js/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('js/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('js/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/fullcalendar.min.js') }}"></script> 
<script src="{{ asset('js/matrix.js') }}"></script> 
<script src="{{ asset('js/matrix.dashboard.js') }}"></script> 
<script src="{{ asset('js/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/matrix.interface.js') }}"></script> 
<script src="{{ asset('js/matrix.chat.js') }}"></script> 
<script src="{{ asset('js/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/matrix.form_validation.js') }}"></script> 
<script src="{{ asset('js/jquery.wizard.js') }}"></script> 
<script src="{{ asset('js/jquery.uniform.js') }}"></script> 
<script src="{{ asset('js/select2.min.js') }}"></script> 
<script src="{{ asset('js/matrix.popover.js') }}"></script> 
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/matrix.tables.js') }}"></script> 

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>




