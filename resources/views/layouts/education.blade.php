@extends('main')

@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Education Statistics</h3>
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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Priorities/ USE education</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="best"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="worst"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Proposed Priority  & Biggest Problem</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="priority"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="problem"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection

@section('pagescripts')
<script>
   $(document).ready(function () {
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
   
   drawPies('best','Priorities',[["Equipped school library and teaching facilities",{{$stats[0]->Equipped_school_library_and_teaching_facilities}}],
   ["Quality of school staff i.e. teachers",{{$stats[0]->Quality_of_school_staff_i_e__teachers}}],
   ["School_infrastructures i.e. class_rooms_and_toilet_facilities_etc.",{{$stats[0]->School_infrastructures_i_e__class_rooms_and_toilet_facilities_etc_}}]
   ], 400);

   drawPies('worst','use education',[["Yes",{{$stats[0]->_Yes}}],
   ["No",{{$stats[0]->_No}}]], 400);

   drawPies('priority','level of education',[["University",{{$stats[0]->TUniversity}}],
   ["O_Level",{{$stats[0]->TO_Level}}],
   ["Primary",{{$stats[0]->TPrimary}}],
   ["Tertiary",{{$stats[0]->TTertiary}}],
   ["A_Level",{{$stats[0]->TA_Level}}],
   ], 400);

   


});


</script>
@endsection