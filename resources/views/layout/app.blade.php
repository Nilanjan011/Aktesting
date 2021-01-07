<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- madhu-->

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Site Metas -->
    <title>Health Lab - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="assets/css/pogo-slider.min.css">
	<!-- Site CSS -->
    <link rel="stylesheet" href="assets/css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    
    <title>@yield('title')</title>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    .user-pic-nav {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;

    object-fit: cover;
    }
</style>
</head>
<body>
    <header>
        @include('include.navbar')
        @include('include.messages')
    </header>
<div class="container">
    @yield('content')



    
</div>
<!-- Start Footer -->
	<footer class="footer-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">Health Lab</a> Design By : <a href="https://html.design/">html design</a></p>
				</div>
			</div>
		</div>
	</footer>
<!-- End Footer -->
    
<a href="#" id="scroll-to-top" class="new-btn-d br-2"><i class="fa fa-angle-up"></i></a>

	<!-- ALL JS FILES -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.pogo-slider.min.js"></script> 
	<script src="assets/js/slider-index.js"></script>
	<script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/TweenMax.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/form-validator.min.js"></script>
    <script src="assets/js/contact-form-script.js"></script>
	<script src="assets/js/isotope.min.js"></script>	
	<script src="assets/js/images-loded.min.js"></script>	
    <script src="assets/js/custom.js"></script>
<script>

$(document).ready(function() {		

$.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#btn-down").attr("disabled", true);
    $('#ApointmentId').blur(function(){
			var Test_id = $('#ApointmentId').val();
			//alert(id);
			$.ajax({
				url:"{{ route('Abalible.Report') }}",
				method:"get",
				data:{Test_id:Test_id,},
				success:function(result)
				{
                   
					if(result == 'available')
					{
						$('#error_report').html('<label class="text-success">Report Available</label>');
						$('#pin').removeClass('has-error');
                        $("#btn-down").attr("disabled", false);
						}
					else
					{
						$('#error_report').html('<label class="text-danger">Report not Available</label>');
						$('#pin').addClass('has-error');
					}
				}
			});
		});


});


</script>




    @yield( "additional-scripts" )
</body>
</html>