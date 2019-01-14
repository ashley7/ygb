<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Region;
use App\Parish;
use App\SubCounty;
use App\Record;
use DB;
class AgricultureController extends Controller
{
    public function showAgricStats($region_name, $district, $sub_county, $parish){

        $distinctage = Record::select('ageCategory')->distinct()->get()->toArray();
        $distinctbest = Record::select('Agric_service_best')->where("Agric_service_best","!=","")->distinct()->get()->toArray();
        $distinctworst = Record::select('agric_service_worst')->where("agric_service_worst","!=","")->distinct()->get()->toArray();
        $distinctproblem = Record::select('Agric_service_problem')->where("Agric_service_problem","!=","")->distinct()->get()->toArray();
        $distinctpriority = Record::select('Agric_proposed_priority')->where("Agric_proposed_priority","!=","")->distinct()->get()->toArray();
        //dd($distinctproblem);
        
        
        $dynamic_string="";
        foreach ($distinctage as $status) {
            $dynamic_string .= ",sum( if( records.ageCategory='".$status['ageCategory']."', 1, 0 ) ) as '_".str_replace(' ','_',$status['ageCategory'])."'";
        }
        foreach ($distinctbest as $status) {
            $dynamic_string .= ",sum( if( records.Agric_service_best='".$status['Agric_service_best']."', 1, 0 ) ) as '".str_replace(' ','_',$status['Agric_service_best'])."'";
        }
        foreach ($distinctworst as $status) {
            $dynamic_string .= ",sum( if( records.agric_service_worst='".$status['agric_service_worst']."', 1, 0 ) ) as '_".str_replace(' ','_',$status['agric_service_worst'])."'";
        }
        foreach ($distinctproblem as $status) {
            $dynamic_string .= ",sum( if( records.Agric_service_problem='".$status['Agric_service_problem']."', 1, 0 ) ) as 'T".str_replace(' ','_',$status['Agric_service_problem'])."'";
        }
        foreach ($distinctpriority as $status) {
            $dynamic_string .= ",sum( if( records.Agric_proposed_priority='".$status['Agric_proposed_priority']."', 1, 0 ) ) as 'O".str_replace(' ','_',$status['Agric_proposed_priority'])."'";
        }

        if($region_name!='all' && $district == 'all' && $sub_county == 'all' && $parish == 'all' ){
            $regions = Region::all()->toArray();
            $region_id = Region::select('id')->where('name','=',$region_name)->get()->toArray();
            $districts = District::where('region_id','=',$region_id[0]['id'])->get()->toArray();
            $parishes = array(array('id'=>'all','name'=>'all'));
            $subcounties = array(array('id'=>'all','name'=>'all'));
            $region = "regions.name";
            $region_value = $region_name;
        }else if($region_name!='all' && $district != 'all' && $sub_county == 'all' && $parish == 'all' ){
            $regions = Region::all()->toArray();
            $region_id = Region::select('id')->where('name','=',$region_name)->get()->toArray();
            $districts = District::where('region_id','=',$region_id[0]['id'])->get()->toArray();
            $district_id = District::select('id')->where('name','=',$district)->get()->toArray();
            $parishes = array(array('id'=>'all','name'=>'all'));
            $subcounties = SubCounty::where('district_id','=',$district_id[0]['id'])->get()->toArray();
            $region = "districts.name";
            $region_value = $district;
            
        }else if($region_name!='all' && $district != 'all' && $sub_county != 'all' && $parish == 'all' ){
            $regions = Region::all()->toArray();
            $region_id = Region::select('id')->where('name','=',$region_name)->get()->toArray();
            $districts = District::where('region_id','=',$region_id[0]['id'])->get()->toArray();
            $district_id = District::select('id')->where('name','=',$district)->get()->toArray();
            //dd($districts);
            $subcounties = SubCounty::where('district_id','=',$district_id[0]['id'])->get()->toArray();
            $subcounty_id = SubCounty::select('id')->where('name','=',$sub_county)->get()->toArray();
            $parishes = array(array('id'=>'all','name'=>'all'));
            $region = "sub_counties.name";
            $region_value = $sub_county;
        }
        
        //dd($dynamic_string);
        
        $stats = DB::select('select '.$region.' as "region", SUM( IF(records.gender = "Male",1,0)) AS "Male", SUM( IF(records.gender = "Female",1,0)) AS "Female" '.$dynamic_string.' from records LEFT JOIN sub_counties on records.sub_county_id = sub_counties.id
        JOIN districts on sub_counties.district_id = districts.id JOIN regions on districts.region_id = regions.id where '.$region.' = "'.$region_value.'"  GROUP BY '.$region);
        //dd($stats);
       $region = $region_name; 
       $dist = $district;
       $sub = $sub_county;
        //dd($dist);
        return view('layouts.agriculture', compact('districts','parishes','regions','subcounties','stats','region','dist','sub','parish'));
    }
}
