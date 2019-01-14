<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Region;
use App\Parish;
use App\SubCounty;
use App\HealthAndEducation;
use DB;
class HealthController extends Controller
{
    public function showHealthStats($region_name, $district, $sub_county, $parish){

        $distinctage = HealthAndEducation::select('ageCategory')->distinct()->get()->toArray();
        $distinctbest = HealthAndEducation::select('best_health_education')->where("best_health_education","!=","")->distinct()->get()->toArray();
        $distinctworst = HealthAndEducation::select('worst_health_education')->where("worst_health_education","!=","")->distinct()->get()->toArray();
        $distinctproblem = HealthAndEducation::select('level_of_education')->where("level_of_education","!=","")->distinct()->get()->toArray();
        $distinctpriority = HealthAndEducation::select('establish_health_education')->where("establish_health_education","!=","")->distinct()->get()->toArray();
        
        $distinctyes = HealthAndEducation::select('yes_establish_health_education')->where("yes_establish_health_education","!=","")->distinct()->get()->toArray();
        //rate_establish_health_education
        $distinctrate = HealthAndEducation::select('rate_establish_health_education')->where("rate_establish_health_education","!=","")->distinct()->get()->toArray();
        //dd($distinctpriority);
        
        
        $dynamic_string="";
        foreach ($distinctage as $status) {
            $dynamic_string .= ",sum( if( health_and_educations.ageCategory='".$status['ageCategory']."', 1, 0 ) ) as '_".str_replace(' ','_',$status['ageCategory'])."'";
        }
        foreach ($distinctbest as $status) {
            $dynamic_string .= ",sum( if( health_and_educations.best_health_education='".$status['best_health_education']."', 1, 0 ) ) as '".str_replace(' ','_',$status['best_health_education'])."'";
        }
        foreach ($distinctworst as $status) {
            $dynamic_string .= ",sum( if( health_and_educations.worst_health_education='".$status['worst_health_education']."', 1, 0 ) ) as '_".str_replace(' ','_',$status['worst_health_education'])."'";
        }
        foreach ($distinctproblem as $status) {
            $dynamic_string .= ",sum( if( health_and_educations.level_of_education='".$status['level_of_education']."', 1, 0 ) ) as 'T".str_replace(' ','_',$status['level_of_education'])."'";
        }
        foreach ($distinctpriority as $status) {
            $dynamic_string .= ",sum( if( health_and_educations.establish_health_education='".$status['establish_health_education']."', 1, 0 ) ) as 'T".str_replace(' ','_',$status['establish_health_education'])."'";
        }
        foreach ($distinctyes as $status) {
            $dynamic_string .= ",sum( if( health_and_educations.yes_establish_health_education='".$status['yes_establish_health_education']."', 1, 0 ) ) as 'X".str_replace(' ','_',$status['yes_establish_health_education'])."'";
        }
        foreach ($distinctrate as $status) {
            $dynamic_string .= ",sum( if( health_and_educations.rate_establish_health_education='".$status['rate_establish_health_education']."', 1, 0 ) ) as 'Y".str_replace(' ','_',$status['rate_establish_health_education'])."'";
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
            $parishes = Parish::where('sub_county_id','=',$subcounty_id[0]['id'])->get()->toArray();
            $region = "sub_counties.name";
            $region_value = $sub_county;
        }
        
        //dd($dynamic_string);
        
        $stats = DB::select('select '.$region.' as "region", SUM( IF(health_and_educations.gender = "Male",1,0)) AS "Male", SUM( IF(health_and_educations.gender = "Female",1,0)) AS "Female" '.$dynamic_string.' from health_and_educations LEFT JOIN  sub_counties on health_and_educations.sub_county_id = sub_counties.id JOIN districts on sub_counties.district_id = districts.id JOIN regions on districts.region_id = regions.id where '.$region.' = "'.$region_value.'"  GROUP BY '.$region);
        //dd($stats);

        $region = $region_name;
       $dist = $district;
       $sub = $sub_county;
        //dd(array($region,$dist,$sub,$parish));
        return view('layouts.health', compact('districts','parishes','regions','subcounties','stats','region','dist','sub','parish'));
    }
}
