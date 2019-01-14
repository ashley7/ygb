@extends('main')

@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Health Statistics</h3>
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
                                <h3 class="panel-title">Best/ worst Health services</h3>
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
                                <h3 class="panel-title">Established health services & level of education</h3>
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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ratings & Utilizations</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="utilization"></div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div id="ratings"></div>
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
   
   drawPies('best','Best Services',[["Testing and treatment for sexually transmitted infections",{{$stats[0]->Testing_and_treatment_for_sexually_transmitted_infections}}],
   ["HIV VCT",{{$stats[0]->HIV_VCT}}],
   ["Contraceptive information and services",{{$stats[0]->Contraceptive_information_and_services}}],
   ["Youth Counseling",{{$stats[0]->Youth_Counseling}}],
   ["Health education",{{$stats[0]->Health_education}}],
   ], 400);

   drawPies('worst','Worst Services',[["Testing and treatment for sexually transmitted infections",{{$stats[0]->_Testing_and_treatment_for_sexually_transmitted_infections}}],
   ["HIV VCT",{{$stats[0]->_HIV_VCT}}],
   ["Contraceptive information and services",{{$stats[0]->_Contraceptive_information_and_services}}],
   ["Youth Counseling",{{$stats[0]->_Youth_Counseling}}],
   ["Health education",{{$stats[0]->_Health_education}}],
   ], 400);

   drawPies('priority','level of education',[["University",{{$stats[0]->TUniversity}}],
   ["O Level",{{$stats[0]->TO_Level}}],
   ["Primary",{{$stats[0]->TPrimary}}],
   ["Tertiary",{{$stats[0]->TTertiary}}],
   ["A Level",{{$stats[0]->TA_Level}}],
   ], 400);

   drawPies('problem','Established Health Services',[["Yes",{{$stats[0]->TYes}}],
   ["No",{{$stats[0]->TNo}}]
   ], 400);

    drawPies('utilization','Health Service Utilization',[["Yes",{{$stats[0]->XYes}}],
   ["No",{{$stats[0]->XNo}}]
   ], 400);

   drawPies('ratings','Health Service Ratings',[["Very Good",{{$stats[0]->YVery_good}}],
   ["Good",{{$stats[0]->YGood}}],
   ["Fair",{{$stats[0]->YFair}}],
   ["Very Bad",{{$stats[0]->YVery_bad}}],
   ["Bad",{{$stats[0]->YBad}}]
   ], 400);

   


});


</script>
@endsection