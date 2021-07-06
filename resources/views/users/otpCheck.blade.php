@extends('users.master')

@section('content')



<div class="banner-top">
	<div class="container">
		<h1>Login</h1>
		<em></em>
		<h2><a href='{{"/"}}'>Home</a><label>/</label>Check OTP</a></h2>
	</div>
</div>
<!--login-->
<div class="container">
		<div class="login">
		@if(session('msg'))
           <div class="alert alert-success">
           	  {{ Session('msg') }}
           </div>
    	@endif
		
			<form action='{{url("/checkinsameotp")}}' method="post" enctype="multipart/form-data">

			{{ csrf_field()}}
			<div class="col-md-6 login-do">
				<div class="login-mail">
					<input type="text" placeholder="Enter Otp" required="" name='otp'>
					<i  class="glyphicon glyphicon-lock"></i>
				</div>
				<label class="hvr-skew-backward">
					<input type="submit" value="Verify">
				</label>
			</div>
			<div class="col-md-6 login-right">
				 <h3>Completely Free Account</h3>
				 
				 <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio 
				 libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
				<a href='{{url("/userregister")}}' class=" hvr-skew-backward">Register</a>

			</div>
			
			<div class="clearfix"> </div>
			</form>
		</div>

</div>

<!--//login-->

</div>
			
</div>
<br><br>
@endsection