@extends('main')

@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Agriculture Statistics</h3>
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
                                <h3 class="panel-title">Best/ worst Agricultural services</h3>
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
   
   drawPies('best','Best Services',[["Advisory services",{{$stats[0]->Advisory_services}}],
   ["Seeds",{{$stats[0]->Seeds}}],["Agricultural_mechanization",{{$stats[0]->Agricultural_mechanization}}],
   ["value_addition_tools_at_the_sub_county",{{$stats[0]->value_addition_tools_at_the_sub_county}}],
   ["Market_linkages",{{$stats[0]->Market_linkages}}],
   ["Access_to_Credit_and_capital",{{$stats[0]->Access_to_Credit_and_capital}}],
   ["Fertilizers",{{$stats[0]->Fertilizers}}],
   ["Pesticides",{{$stats[0]->Pesticides}}],
   ["Agricultural_Extension_services",{{$stats[0]->Agricultural_Extension_services}}],
   ["Water_for_production",{{$stats[0]->Water_for_production}}],
   ["Support_to_address_challenges_of_climate_change",{{$stats[0]->Support_to_address_challenges_of_climate_change}}],
   ], 400);

   drawPies('worst','Worst Services',[["Advisory services",{{$stats[0]->_Advisory_services}}],
   ["Seeds",{{$stats[0]->_Seeds}}],["Agricultural_mechanization",{{$stats[0]->_Agricultural_mechanization}}],
   ["value_addition_tools_at_the_sub_county",{{$stats[0]->_value_addition_tools_at_the_sub_county}}],
   ["Market_linkages",{{$stats[0]->_Market_linkages}}],
   ["Access_to_Credit_and_capital",{{$stats[0]->_Access_to_Credit_and_capital}}],
   ["Fertilizers",{{$stats[0]->_Fertilizers}}],
   ["Pesticides",{{$stats[0]->_Pesticides}}],
   ["Agricultural_Extension_services",{{$stats[0]->_Agricultural_Extension_services}}],
   ["Water_for_production",{{$stats[0]->_Water_for_production}}],
   ["Support_to_address_challenges_of_climate_change",{{$stats[0]->_Support_to_address_challenges_of_climate_change}}],
   ], 400);

   drawPies('problem','Biggest problem being faced',[["Advisory services",{{$stats[0]->TAdvisory_services}}],
   ["Seeds",{{$stats[0]->TSeeds}}],["Agricultural_mechanization",{{$stats[0]->TAgricultural_mechanization}}],
   ["value_addition_tools_at_the_sub_county",{{$stats[0]->Tvalue_addition_tools_at_the_sub_county}}],
   ["Market_linkages",{{$stats[0]->TMarket_linkages}}],
   ["Access_to_Credit_and_capital",{{$stats[0]->TAccess_to_Credit_and_capital}}],
   ["Fertilizers",{{$stats[0]->TFertilizers}}],
   ["Pesticides",{{$stats[0]->TPesticides}}],
   ["Agricultural_Extension_services",{{$stats[0]->TAgricultural_Extension_services}}],
   ["Water_for_production",{{$stats[0]->TWater_for_production}}],
   ["Support_to_address_challenges_of_climate_change",{{$stats[0]->TSupport_to_address_challenges_of_climate_change}}],
   ], 400);

   drawPies('priority','Proposed Priority',[["Advisory services",{{$stats[0]->OAdvisory_services}}],
   ["Seeds",{{$stats[0]->OSeeds}}],["Agricultural_mechanization",{{$stats[0]->OAgricultural_mechanization}}],
   ["value_addition_tools_at_the_sub_county",{{$stats[0]->Ovalue_addition_tools_at_the_sub_county}}],
   ["Market_linkages",{{$stats[0]->OMarket_linkages}}],
   ["Access_to_Credit_and_capital",{{$stats[0]->OAccess_to_Credit_and_capital}}],
   ["Fertilizers",{{$stats[0]->OFertilizers}}],
   ["Pesticides",{{$stats[0]->OPesticides}}],
   ["Agricultural_Extension_services",{{$stats[0]->OAgricultural_Extension_services}}],
   ["Water_for_production",{{$stats[0]->OWater_for_production}}],
   ["Support_to_address_challenges_of_climate_change",{{$stats[0]->OSupport_to_address_challenges_of_climate_change}}],
   ], 400);



});


</script>
@endsection