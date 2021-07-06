@extends('users.master')

@section('content')



<!--banner-->
<div class="banner">
<div class="container">
<section class="rw-wrapper">
				<h1 class="rw-sentence">
					<span class="tag-content">Ebook</span>
					<div class="rw-words rw-words-1" class="tag-content">
						<span class="tag-content">Books are a uniquely portable magic</span>
						<span class="tag-content">The book you don’t read won’t help.</span>
						<span class="tag-content">A book is a dream that you hold in your hand</span>
						<span class="tag-content">In a good book the best is between the lines.</span>
					</div>
					<div class="rw-words rw-words-2" class="tag-content">
						<span class="tag-content">Reading a book is like re-writing it for yourself.</span>
						<span class="tag-content">Where is human nature so weak as in the bookstore?</span>
						<span class="tag-content">What you don’t know would make a great book. </span>
					</div>
				</h1>
			</section>
			</div>
</div>
	<!--content-->
		<div class="content">
			<div class="container">
				<div class="content-top">
					<div class="col-md-6 col-md">
						<div class="col-1">
						 <a href='{{url("/product/Fiction/Drama")}}' class="b-link-stroke b-animate-go  thickbox">
		   <img src="{{ asset('user_assest/images/pi.png') }}" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">Category Wise Book Providers</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Trendy</h3></div></a>

							<!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
						</div>
						<br>
						<div class="col-1">
						 <a href='{{url("/product/Fiction/Drama")}}' class="b-link-stroke b-animate-go  thickbox">
		   <img src="{{ asset('user_assest/images/pi1.png') }}" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">SubCategory Wise Book Providers</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Trendy</h3></div></a>

							<!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
						</div>
						<br>
						<div class="col-1">
						 <a href='{{url("/product/Fiction/Drama")}}' class="b-link-stroke b-animate-go  thickbox">
		   <img src="{{ asset('user_assest/images/pi2.png') }}" class="img-responsive" alt=""/><div class="b-wrapper1 long-img"><p class="b-animate b-from-right    b-delay03 ">Different-Different Type Book</p><label class="b-animate b-from-right    b-delay03 "></label><h3 class="b-animate b-from-left    b-delay03 ">Trendy</h3></div></a>

							<!---<a href="single.html"><img src="images/pi.jpg" class="img-responsive" alt=""></a>-->
						</div>
						
					</div>
					<div class="col-md-6 col-md1">
						<div class="col-3">
							<a href='{{url("/product/Fiction/Drama")}}'><img src="{{ asset('user_assest/images/drama.png')}}" class="img-responsive" alt="">
							<div class="col-pic">
								<p>FICTION</p>
								<label></label>
								<h5>DRAMA</h5>
							</div></a>
						</div>
						<div class="col-3">
							<a href='{{url("/product/Non-Fiction/Advertising")}}'><img src="{{ asset('user_assest/images/advertising.png') }}" class="img-responsive" alt="">
							<div class="col-pic">
								<p>NON-FICTION</p>
								<label></label>
								<h5>ADVERTISING</h5>
							</div></a>
						</div>
						<div class="col-3">
							<a href='{{url("/product/Academic/archieves")}}'><img src="{{ asset('user_assest/images/archievs.jpg') }}" class="img-responsive" alt="">
							<div class="col-pic">
								<p>ACADEMIC</p>
								<label></label>
								<h5>Archives</h5>
							</div></a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<!--products-->
		
			<!--//products-->
			<!--brand-->
			
			<!--//brand-->
			</div>
			
		</div>
	


@endsection