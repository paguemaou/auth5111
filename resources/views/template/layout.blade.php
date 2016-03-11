<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="{{ asset('favicon.ico') }}">


	<title>{{ getenv('NOM_DU_SITE') }}</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.5-dist/css/bootstrap.min.css') }}" media="all" /> <!-- media="all" pour screen ET print -->
  <!-- Custom styles for this template : AFTER Bootstrap Core and BEFORE Responsive -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
  <!-- Bootstrap responsive CSS  intégré dans Bootstrap -->
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap-3.3.2-dist/css/bootstrap-responsive.css') }}" />-->

  <!-- Custom Fonts -->
  <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome-4.4.0/css/font-awesome.min.css') }}" /> 

  <!-- end of global css -->
  <!--page level css-->
  @yield('header_styles')
  <!--end of page level css-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


    </head>
    <body>
      @include('partial.navbar')
      <div class="container">
      <!-- affiche Laracast/flash -->
      @include('flash::message')
      <!-- FIN affiche Laracast/flash -->

      <!-- content start -->
      @yield('content')
      <!-- content end -->

    </div><!-- /container -->

  	<!-- Bootstrap and JQuery core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- jQuery for Datatables (must be placed above the call to Datables)-->
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script> 
    <script type="text/javascript" charset="utf8" src="{{ asset('bootstrap-3.3.5-dist/js/bootstrap.min.js') }}"></script>

    <!-- Nécessaire uniquement pour flash::overlay('...') -->
    <script>$('#flash-overlay-modal').modal();</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
    <!-- end of global js -->

    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->

  </body>
  </html>
