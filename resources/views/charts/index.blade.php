@extends('layouts.app')

@section('content')

<div class="table-responsive col-md-12" >
    <div id="container" ></div>

</div>

    @section('javascripts')
      @parent
        <script type="text/javascript">
        $( document ).ready(function() {

                var skills = {!! json_encode($skills->toArray()) !!};
                var dates= {!! $dates !!};
                
                //d = $.parseJSON(dates);
                //console.log(dates);
                
                $(dates).each(function (i, val) 
                {
                     console.log(dates[i].date);    
//                                  $("select#nomsociete_pc option[value="+val.id+"]").prop("selected", true).prop('disabled',false);
//                                 // $("select#typesociete option[value="+val.typesociete+"]").prop("selected", true).prop('disabled',false);
//                                  $("select#comptablesenior_pc option[value="+val.comptablesenior+"]").prop("selected", true).prop('disabled',false);
//                                  $("select#comptablemanageur_pc option[value="+val.comptablemanageur+"]").prop("selected", true).prop('disabled',false);     
//                                  $("select#site_pc option[value="+val.site+"]").prop("selected", true).prop('disabled',false); 
                             
                })
                //console.log(dates);
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
                            dateTimeLabelFormats: { // don't display the dummy year
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
//                            max: 5,
  //                          categories: [1, 2, 3, 4, 5],
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
                        series: [{
                            name: "Evolutie skill UNIX",
                            data: [
                                [Date.UTC(1970, 10, 25), 0],
                                [Date.UTC(1970, 11,  6), 0.25],
                                [Date.UTC(1970, 11, 20), 1.41],
                                [Date.UTC(1970, 11, 25), 1.64],
                                [Date.UTC(1971, 0,  4), 1.6],
                                [Date.UTC(1971, 0, 17), 2.55],
                                [Date.UTC(1971, 0, 24), 2.62],
                                [Date.UTC(1971, 1,  4), 2.5],
                                [Date.UTC(1971, 1, 14), 2.42],
                                [Date.UTC(1971, 2,  6), 2.74],
                                [Date.UTC(1971, 2, 14), 2.62],
                                [Date.UTC(1971, 2, 24), 2.6],
                                [Date.UTC(1971, 3,  1), 2.81],
                                [Date.UTC(1971, 3, 11), 2.63],
                                [Date.UTC(1971, 3, 27), 2.77],
                                [Date.UTC(1971, 4,  4), 2.68],
                                [Date.UTC(1971, 4,  9), 2.56],
                                [Date.UTC(1971, 4, 14), 2.39],
                                [Date.UTC(1971, 4, 19), 2.3],
                                [Date.UTC(1971, 5,  4), 2],
                                [Date.UTC(1971, 5,  9), 1.85],
                                [Date.UTC(1971, 5, 14), 1.49],
                                [Date.UTC(1971, 5, 19), 1.27],
                                [Date.UTC(1971, 5, 24), 0.99],
                                [Date.UTC(1971, 5, 29), 0.67],
                                [Date.UTC(1971, 6,  3), 0.18],
                                [Date.UTC(1971, 6,  4), 0]
                            ]
                        }]
            });
        });
        </script>   
    @endsection
    
@endsection