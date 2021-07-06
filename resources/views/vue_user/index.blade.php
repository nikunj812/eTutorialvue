    <!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Ebook : Providing For Ebook</title>
        <link href="{{ asset('user_assest/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- Custom Theme files -->
        <!--theme-style-->
        <link href="{{ asset('user_assest/css/style.css') }} " rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!--theme-style-->
        <link href="{{ asset('user_assest/css/style4.css') }}" rel="stylesheet" type="text/css" media="all" />	
        <!--//theme-style-->
        <script src="{{ asset('user_assest/js/jquery.min.js') }}"></script>
    <!--- start-rate---->
        <!-- <script src="js/jstarbox.js"></script>
            <link rel="stylesheet" href="{{ asset('user_assest/css/jstarbox.css') }}" type="text/css" media="screen" charset="utf-8" />
                <script type="text/javascript">
                    jQuery(function() {
                    jQuery('.starbox').each(function() {
                        var starbox = jQuery(this);
                            starbox.starbox({
                            average: starbox.attr('data-start-value'),
                            changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                            ghosting: starbox.hasClass('ghosting'),
                            autoUpdateAverage: starbox.hasClass('autoupdate'),
                            buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                            stars: starbox.attr('data-star-count') || 5
                            }).bind('starbox-value-changed', function(event, value) {
                            if(starbox.hasClass('random')) {
                            var val = Math.random();
                            starbox.next().text(' '+val);
                            return val;
                            } 
                        })
                    });
                });
                </script> -->
        <!---//End-rate---->
        
    
    </head>
    <body>
        <div id="app">
            <header-user></header-user>
            <router-view></router-view>
            <footer-user></footer-user>
            <!-- Bootstrap core JavaScript-->
        </div>
        <script src="{{mix('js/app.js')}}"></script>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('user_assest/js/simpleCart.min.js') }}"> </script>
        <!-- slide -->
        <script src="{{ asset('user_assest/js/bootstrap.min.js') }}"></script>
        <!--light-box-files -->
                <script src="{{ asset('user_assest/js/jquery.chocolat.js') }}"></script>
                <link rel="stylesheet" href="{{ asset('user_assest/css/chocolat.css') }}" type="text/css" media="screen" charset="utf-8">
                <!--light-box-files -->
                <script type="text/javascript" charset="utf-8">
                $(function() {
                    $('a.picture').Chocolat();
                });
		</script>

        
						<!---pop-up-box---->					  
			<link href="{{ asset('user_assest/css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all"/>
			<script src="{{ asset('user_assest/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
			<!---//pop-up-box---->
</body>
</html>