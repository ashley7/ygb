<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Region;
use App\Parish;
use App\SubCounty;
use App\HealthAndEducation;
use DB;

class DashboardController extends Controller
{
    public function showStats(){
            $regions = array(array('id'=>'all','name'=>'all'));
            $region_id = array(array('id'=>'all','name'=>'All'));
            $districts = array(array('id'=>'all','name'=>'All'));
            $parishes = array(array('id'=>'all','name'=>'All'));
            $subcounties = array(array('id'=>'all','name'=>'All'));

            $no_of_districts = count(District::all()->toArray());
            $no_of_regions = count(Region::all()->toArray());
            $no_of_parishes = count(Parish::all()->toArray());
            $no_ssub_counties = count(SubCounty::all()->toArray());

            //get gender stats from three tables

            $distinctage = HealthAndEducation::select('ageCategory')->distinct()->get()->toArray();
            $distinctgender = HealthAndEducation::select('gender')->distinct()->get()->toArray();
            $dynamic_string="";
            foreach ($distinctage as $status) {
                $dynamic_string .= ",(SELECT COUNT(ageCategory) FROM records WHERE `ageCategory` = '".$status['ageCategory']."') + (SELECT COUNT(ageCategory) FROM education WHERE `ageCategory` = '".$status['ageCategory']."') + (SELECT COUNT(ageCategory) FROM health_and_educations WHERE `ageCategory` = '".$status['ageCategory']."') as '_".str_replace(' ','_',$status['ageCategory'])."'";
            }
            foreach ($distinctgender as $status) {
                $dynamic_string .= ",(SELECT COUNT(gender) FROM records WHERE `gender` = '".$status['gender']."') + (SELECT COUNT(gender) FROM education WHERE `gender` = '".$status['gender']."') + (SELECT COUNT(gender) FROM health_and_educations WHERE `gender` = '".$status['gender']."') as '".str_replace(' ','_',$status['gender'])."'";
            }
            //dd($dynamic_string);
            
            $stats = DB::select('SELECT (SELECT COUNT(ageCategory) FROM records)'.$dynamic_string);
            //dd($stats);

            $region = 'all';
            $dist = 'all';
            $sub = 'all';
            $parish = 'all';
        return view('layouts.dashboard', compact('districts','parishes','regions','subcounties','region','dist','sub','parish','no_of_districts','no_of_regions','no_of_parishes','no_ssub_counties','stats'));
    }
}
