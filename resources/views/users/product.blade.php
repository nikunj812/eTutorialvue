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

		<div class="product">
			<div class="container">
			<div class="col-md-12">
			<div class="mid-popular">
				@foreach($productdata as $pdata)
					<div class="col-md-4 item-grid1 simpleCart_shelfItem">
						<div class=" mid-pop">
							<div class="pro-img">
								<img src='{{ url("admin/images/$pdata->product_image")}} ' class="img-responsive" alt="" >
							</div>
							<div class="mid-1">
								<div class="women">
									<div class="women-top">
										<div class="demo">
											<span>{{ $pdata->product_cat_name}}</span>
											<a href="/singlerecord/{{$pdata->product_id}}"><i class="glyphicon glyphicon-book"></i></a>
                                           </div>
										<h6><a href="/singlerecord/{{$pdata->product_id}}">{{ $pdata->product_name }}</a></h6>
										<a href='{{ url("admin/books/$pdata->product_file")}}' download><img src="{{ asset('user_assest/images/downloadd.png') }}" alt="" class="download_button"></a>
                                        
									</div>
									
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
				@endforeach	
					
				<div class="clearfix"></div>
				</div>
			</div>
			</div>
				
			<div class="col-md-3 product-bottom"></div>
			<!--categories-->
			
				<!--initiate accordion-->
							<!-- <script type="text/javascript">	
								$(function() {
									var menu_ul = $('.menu-drop > li > ul'),
										menu_a  = $('.menu-drop > li > a');
									menu_ul.hide();
									menu_a.click(function(e) {
										e.preventDefault();
										if(!$(this).hasClass('active')) {
											menu_a.removeClass('active');
											menu_ul.filter(':visible').slideUp('normal');
											$(this).addClass('active').next().stop(true,true).slideDown('normal');
										} else {
											$(this).removeClass('active');
											$(this).next().stop(true,true).slideUp('normal');
										}
									});
								
								});
							</script> -->
		
		
@endsection




