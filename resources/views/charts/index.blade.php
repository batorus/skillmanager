@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        
        <a href='{{ url('skills/'.$user->id) }}'                                  
           class="btn btn-block btn-warning btn-sm" 
           style ="width:200px;color:#fff; margin-top:10px;" 
        >Back to list of skills </a>
    </div>

    <div>&nbsp;</div>
        
<div class="table-responsive col-md-12" >
    
    <div id="container" ></div>

</div>

    @section('javascripts')
      @parent
    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/highcharts.js')}}"></script>    
    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/modules/series-label.js')}}"></script>
    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/modules/exporting.js')}}"></script>
    <script type="text/javascript" src="{{asset('forall/chartjs/Highcharts-6.1.3/code/modules/export-data.js')}}"></script>      
      
        <script type="text/javascript">
        $( document ).ready(function() {

                //var skills = {!! json_encode($skills->toArray()) !!};
                var datas = {!! $datas!!};
                

            var arr = [];
            var serie = [];
              
            for(var entry in datas){

                   var dataCopy = datas[entry];

                dates = [];
                $(dataCopy).each(function (i, val){
                    dates.push([Date.UTC(val.year, val.month-1, val.day), val.level]);                            
                })
                               
                serie.push({ 
                       "name" : entry,
                       "data"  : dates
                   });

            }
              
            Highcharts.chart('container', {
                        chart: {
                            type: 'spline'
                        },
                        title: {
                            text: 'Domains and levels of IT Knowledge'
                        },
                        subtitle: {
                            text: 'Display the evolution of skills'
                        },
                        xAxis: {
                            type: 'datetime',
                            dateTimeLabelFormats: { 
                                month: '%e. %b',
                                year: '%b'
                            },
                            title: {
                                text: 'Date'
                            }
                        },
                        yAxis: {
                            title: {
                                text: 'Level'
                            },
                            min: 1,
                            max: 5,

                            allowDecimals: false
                        },
                        tooltip: {
                            headerFormat: '<b>{series.name}</b><br>',
                            pointFormat: 'Date: {point.x:%e.%b.%Y} | Level: {point.y}'
                        },

                        plotOptions: {
                            spline: {
                                marker: {
                                    enabled: true
                                }
                            }
                        },

                        colors: ['#6CF', '#39F', '#06C', '#036', '#000'],
                        
                        series: serie

            });

        
        });
        </script>   
    @endsection
    
@endsection



