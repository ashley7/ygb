<?php

namespace App\Http\Controllers;
use App\layouts;
use App\BusinessMembers;
use App\BusinessCategory;
use Illuminate\Http\Request;

class BusinessMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $businesses = BusinessCategory::where('userId', '1')->get();
        return view('layouts.addMember', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //adding business specific members
        $member = new BusinessMembers([
            "categoryId"=> $request->get('business_name'),
            "lastName"=> $request->get('lName'),
            "firstName"=> $request->get('fName'),
            "passportPhoto"=> $request->get('pphoto'),
            "IdPhoto"=> $request->get('nphoto'),
            "country"=> $request->get('country'),
            "district"=> $request->get('district'),
            "phoneNumber"=> $request->get('pNumber'),
            "email"=> $request->get('email'),
            "userId"=> "1",
        ]);
        $member->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessMembers  $businessMembers
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessMembers $businessMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessMembers  $businessMembers
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessMembers $businessMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessMembers  $businessMembers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessMembers $businessMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessMembers  $businessMembers
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessMembers $businessMembers)
    {
        //
    }
}
