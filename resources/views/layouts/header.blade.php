@section ('stylesheets')
    <link href="{{asset('forall/bootstrap-4.1.2/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('forall/fontawesome-5.1.1/css/all.css') }}" rel="stylesheet" />
        
    <link href="{{ asset('forall/AdminLTE-2.4.5/dist/css/AdminLTE.min.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('forall/AdminLTE-2.4.5/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('forall/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('forall/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('forall/css/views.css') }}" rel="stylesheet" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
@show

@section ('javascripts')
    <script type="text/javascript" src="{{ asset('forall/jquery/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('forall/bootstrap-4.1.2/dist/js/bootstrap.min.js') }}"></script>    
    <script type="text/javascript" src="{{ asset('forall/AdminLTE-2.4.5/dist/js/adminlte.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('forall/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/highcharts.js')}}"></script>    
   
    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/modules/series-label.js')}}"></script>
    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/modules/exporting.js')}}"></script>
    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/modules/export-data.js')}}"></script>

@show