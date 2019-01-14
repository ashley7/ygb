@extends('main')

@section('content')

<div class="row">
               
                    <div class="col-md-12">
                        <div class="row">
                            <div class="page-title text-center"> 
                                <h3 class="title">Welcome to Youth Go Budget!</h3> 
                            </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-pink">
                            <i class="ion-location"></i> 
                            <h2 class="m-0 counter">{{$no_of_regions}}</h2>
                            <div>Regions</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-purple">
                            <i class="ion-location"></i> 
                            <h2 class="m-0 counter">{{$no_of_districts}}</h2>
                            <div>Districts</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-info">
                            <i class="ion-location"></i> 
                            <h2 class="m-0 counter">{{$no_ssub_counties}}</h2>
                            <div>Sub Counties</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="widget-panel widget-style-2 bg-success">
                            <i class="ion-location"></i> 
                            <h2 class="m-0 counter">{{$no_of_parishes}}</h2>
                            <div>Parishes</div>
                        </div>
                    </div>
                </div> <!-- end row -->
                <div class="row">
                <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">General Statistics</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="age"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="gender"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                 
   
        </div> <!-- end col -->

</div> <!-- End row -->
 @endsection
 @section('pagescripts')
<script>
   $(document).ready(function () {
    $("#select_paths").hide();
    //var stats = JSON.parse("{{json_encode($stats)}}".replace(/&quot;/g,'"'));
    //console.log(stats)
   function drawPies(div_id, title, data_passed, height){
    $('#'+div_id).highcharts({
                            chart: {
                                plotBorderWidth: null,
                                plotShadow: true,
                                height:height,
                                


                            },exporting: { enabled: true },
                            title: {
                                text: title,
                                enabled: true,
                            },
                            subtitle: {
                                text: '',
                                enabled: false,
                            },
                            credits: {
                                text: 'Source:NAC Data'
                            },
                            tooltip: {
                                pointFormat: '{point.name}: <b>{point.y:,.0f} <br/>({point.percentage:.0f}%)</b>'
                            },
                            plotOptions: {
                                pie: {
                                   
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: true,
                                        format: '{point.y} [{point.percentage:.0f} %]'
                                    },
                                    showInLegend: false
                                }
                            },
                            series: [{
                                type: 'pie',
                                name: 'Projects run',
                                data: data_passed,
                                
                                size: 200,
                                showInLegend: true,
                                dataLabels: {
                                enabled: true
                                }
                            }]
        });
   }  
   
   drawPies('age','Sample space by age range',[["18 to 29 years",{{$stats[0]->_18_to_29_years}}],["Below 18 years",{{$stats[0]->_Below_18_years}}],["30 to 35 years",{{$stats[0]->_30_to_35_years}}]], 300);
   
   drawPies('gender','Sample space by gender',[["Male",{{$stats[0]->Male}}], ["Female",{{$stats[0]->Female}}]], 300);
  
   


});


</script>
@endsection
