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
        <script type="text/javascript">
        $( document ).ready(function() {

                //var skills = {!! json_encode($skills->toArray()) !!};
                var datas = {!! $datas!!};
                
                //d = $.parseJSON(dates);
               // console.log(datas);
          
 
              //var  arrdates = [];
              var arr = [];
              var serie = [];
              
               for(var entry in datas){
                  // console.log(entry); 
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
                            //categories: ["level 1", "level 2", "level 3", "level 4", "level 5"],
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

                        // Define the data points. All series have a dummy year
                        // of 1970/71 in order to be compared on the same x axis. Note
                        // that in JavaScript, months start at 0 for January, 1 for February etc.

                        series: serie
//                                [{
//                            name: key,
//                            data: arr[key]
//                        }
//                        ,
//                        {
//                            name: "Evolutie skill UNIX",
//                            data: dates
//                        }
//                        ]

            });

        
        });
        </script>   
    @endsection
    
@endsection