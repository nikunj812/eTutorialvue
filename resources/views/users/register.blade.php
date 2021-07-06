@extends('users.master')

@section('content')


<!--banner-->
<div class="banner-top">
	<div class="container">
		<h1>Register</h1>
		<em></em>
		<h2><a href="index.html">Home</a><label>/</label>Register</a></h2>
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
		
			<form action='{{url("/insertuser")}}' method="post"  enctype="multipart/form-data">
            {{ csrf_field() }}
			<div class="col-md-6 login-do">
			<div class="login-mail">
					<input type="text" placeholder="Name" required="" name="name" id="name">
					<i  class="glyphicon glyphicon-user"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Phone Number" required="" name="phone" id="phone">
					<i  class="glyphicon glyphicon-phone"></i>
				</div>
				<div class="login-mail">
					<input type="text" placeholder="Email" id="email" name="email" id="email" required="">
					<i  class="glyphicon glyphicon-envelope"></i>
					@error('email')
					<strong>{{ $message}}</strong>
					@enderror
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" required="" name="password" id="password">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<label class="hvr-skew-backward">
					<input type="submit" value="Submit">
				</label>
                @error('email') 

              {{ message}}

				@enderror 
			
			</div>
			<div class="col-md-6 login-right">
				 <h3>Free Account</h3>
				 
				 <p>Used For Free Ebook Download</p>
				<a href='{{url("/userlogin")}}' class="hvr-skew-backward">Login</a>

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