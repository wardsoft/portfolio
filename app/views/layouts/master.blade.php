<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="Food review platform, food reviews, resturaunt reviews, reviews" />
		<meta name="description" content="HonestEat - Food review platform">
		<meta name="author" content="wardsoft.co.uk">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/bootstrap/css/bootstrap.css');?>" />
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/font-awesome/css/font-awesome.css')?>" />
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/magnific-popup/magnific-popup.css')?>" />
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/bootstrap-datepicker/css/datepicker3.css')?>" />
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/dropzone/css/basic.css')?>" />
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/dropzone/css/dropzone.css')?>" />
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/summernote/summernote.css')?>" />
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/summernote/summernote-bs3.css')?>" />		
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/codemirror/lib/codemirror.css')?>" />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo asset('assets/stylesheets/theme.css')?>" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo asset('assets/stylesheets/skins/default.css')?>" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo asset('assets/stylesheets/theme-custom.css')?>">

		<!-- Head Libs -->
		<script src="<?php echo asset('assets/vendor/modernizr/modernizr.js')?>"></script>
		<link rel="stylesheet" href="<?php echo asset('assets/vendor/pnotify/pnotify.custom.css')?>" />
		
	</head>
	<body>
		@yield('content')
	<!-- Vendor -->
		<!-- Vendor -->
		<script src="<?php echo asset('assets/vendor/jquery/jquery.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/bootstrap/js/bootstrap.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/nanoscroller/nanoscroller.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/magnific-popup/magnific-popup.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/pnotify/pnotify.custom.js')?>"></script>

		<!-- Specific Page Vendor -->
		<script src="<?php echo asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jquery-appear/jquery.appear.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/flot/jquery.flot.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js"')?>></script>
		<script src="<?php echo asset('assets/vendor/flot/jquery.flot.pie.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/flot/jquery.flot.categories.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/flot/jquery.flot.resize.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jquery-sparkline/jquery.sparkline.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/raphael/raphael.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/morris/morris.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/gauge/gauge.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/snap-svg/snap.svg.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/liquid-meter/liquid.meter.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/jquery.vmap.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/data/jquery.vmap.sampledata.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js')?>"></script>
		<script src="<?php echo asset('assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"')?>></script>
		<script src="<?php echo asset('assets/vendor/dropzone/dropzone.js"')?>></script>
		<script src="<?php echo asset('assets/javascripts/ui-elements/examples.notifications.js"')?>></script>
		<script src="<?php echo asset('assets/vendor/summernote/summernote.js"')?>"></script>
				
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo asset('assets/javascripts/theme.js')?>"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo asset('assets/javascripts/theme.custom.js')?>"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo asset('assets/javascripts/theme.init.js')?>"></script>

		
	</body>
</html>