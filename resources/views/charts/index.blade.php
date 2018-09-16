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
                var datas= {!! $datas!!};
                
                //d = $.parseJSON(dates);
                //console.log(dates);
                
                $(datas).each(function (i, val) 
                {
                     //console.log(dates[i].date); 
                     //console.log(skills[i].date_recorded); 
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
                        series: [{
                            name: "Evolutie skill UNIX",
                            data: [

                                [Date.UTC(2018, 0, 17), 2.55],
                                [Date.UTC(2018, 0, 24), 2.62],
                                [Date.UTC(2018, 1,  4), 2.5],
                                [Date.UTC(2018, 1, 14), 2.42],
                                [Date.UTC(2018, 2,  6), 2.74],
                                [Date.UTC(2018, 2, 14), 2.62],
                                [Date.UTC(2018, 2, 24), 2.6],
                                [Date.UTC(2018, 3,  1), 2.81],
                                [Date.UTC(2018, 3, 11), 2.63],
                                [Date.UTC(2018, 3, 27), 2.77],
                                [Date.UTC(datas[0].year, datas[0].month - 1,  datas[0].day), 5],                                
                                [Date.UTC(2018, 11,  6), 2],
                                [Date.UTC(2018, 11, 20), 3],
                                [Date.UTC(2018, 11, 25), 4],
   
                            ]
                        }]
            });
        });
        </script>   
    @endsection
    
@endsection