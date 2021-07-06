@extends('users.master')

@section('content')

<div class="banner-top">
	<div class="container">
		<h1>Ebooks</h1>
		<em></em>
		<h2><a href="{{ url('/')}}">Home</a><label>/</label>Ebooks</a></h2>
	</div>
</div>
	<!--content-->
	<hr>
	<div class="container-fluid text-center">    
  <div class="row content">
  @foreach($productdata as $pdata)
    <div class="col-sm-4 sidenav">
	<img src='{{ url("admin/images/$pdata->product_image")}} ' class="img-responsive" alt="" >
    </div>
    <div class="col-sm-8 text-left" style="color:#ff5e007a"> 
        <h4>Book Category : {{ $pdata->product_cat_name}}</h4>
		<hr>
        <h4>Book SubCategory : {{ $pdata->product_sub_name}}</h4>
		<hr>
        <h4>Book name : {{ $pdata->product_name}}</h4>
    	<br>
		<hr>
		<h4> book_description </h4>
		<br>
        <p>{{$pdata->product_desc}}</p>
          </div>
	@endforeach
    
  </div>
</div>
<hr>

		
		
		
@endsection




