<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Region;
use App\Parish;
use App\SubCounty;
use App\Education;
use DB;
class EducationController extends Controller
{
    public function showEducStats($region_name, $district, $sub_county, $parish){

        $distinctage = Education::select('ageCategory')->distinct()->get()->toArray();
        $distinctbest = Education::select('priority_use_education_service')->where("priority_use_education_service","!=","")->distinct()->get()->toArray();
        $distinctworst = Education::select('use_education')->where("use_education","!=","")->distinct()->get()->toArray();
        $distinctproblem = Education::select('level_of_education')->where("level_of_education","!=","")->distinct()->get()->toArray();
        //$distinctpriority = Education::select('priority_health_education')->where("priority_health_education","!=","")->distinct()->get()->toArray();
        //dd($distinctbest);
        
        
        $dynamic_string="";
        foreach ($distinctage as $status) {
            $dynamic_string .= ",sum( if( education.ageCategory='".$status['ageCategory']."', 1, 0 ) ) as '_".str_replace(' ','_',$status['ageCategory'])."'";
        }
        foreach ($distinctbest as $status) {
            $dynamic_string .= ",sum( if( education.priority_use_education_service='".$status['priority_use_education_service']."', 1, 0 ) ) as '".str_replace('.','_',str_replace(' ','_',$status['priority_use_education_service']))."'";
        }
        foreach ($distinctworst as $status) {
            $dynamic_string .= ",sum( if( education.use_education='".$status['use_education']."', 1, 0 ) ) as '_".str_replace(' ','_',$status['use_education'])."'";
        }
        foreach ($distinctproblem as $status) {
            $dynamic_string .= ",sum( if( education.level_of_education='".$status['level_of_education']."', 1, 0 ) ) as 'T".str_replace(' ','_',$status['level_of_education'])."'";
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
        
        $stats = DB::select('select '.$region.' as "region", SUM( IF(education.gender = "Male",1,0)) AS "Male", SUM( IF(education.gender = "Female",1,0)) AS "Female" '.$dynamic_string.' from education LEFT JOIN  sub_counties on education.sub_county_id = sub_counties.id JOIN districts on sub_counties.district_id = districts.id JOIN regions on districts.region_id = regions.id where '.$region.' = "'.$region_value.'"  GROUP BY '.$region);
        //dd($stats);
        $region = $region_name;
       $dist = $district;
       $sub = $sub_county;
        //dd($dist);

        return view('layouts.education', compact('districts','parishes','regions','subcounties','stats','region','dist','sub','parish'));
    }
}
