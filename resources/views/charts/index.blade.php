@extends('layouts.app')

@section('content')

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

//                   for(key in dataCopy){
//                     console.log(key);
////                       if(key == "start" || key == "end"){
////                           // needs more specific method to manipulate date to your needs
////                           dataCopy[key] = new Date(dataCopy[key])
////                       }
//                   }
                  // arr[].push(dataCopy)

                dates = [];
                $(dataCopy).each(function (i, val) 
                {//datas[0].year, datas[0].month - 1,  datas[0].day
                    // console.log(val); 
                     //console.log(skills[i].date_recorded); 
                    dates.push([Date.UTC(val.year, val.month-1, val.day), val.level]);
                             
                })
                
                
                serie.push({ 
                       "name" : entry,
                       "data"  : dates
                   });
               // arr[entry] = dates;
            }
       
            for(key in arr){

                    // console.log(arr[key]);
//                       if(key == "start" || key == "end"){
//                           // needs more specific method to manipulate date to your needs
//                           dataCopy[key] = new Date(dataCopy[key])
//                       }


               
        }
        
            Highcharts.chart('container', {
                        chart: {
                            type: 'spline'
                        },
                        title: {
                            text: 'Denumire Domeniu aici'
                        },
                        subtitle: {
                            text: 'Descriere scurta'
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
                            pointFormat: '{point.x:%e. %b}: {point.y:.2f} m'
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