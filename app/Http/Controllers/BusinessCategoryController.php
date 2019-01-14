<?php

namespace App\Http\Controllers;
use App\layouts;
use App\BusinessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.addbusiness');
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
        //adding a business category to the database
        $businessCategory = new BusinessCategory([
            
            "categoryName"=> $request->get('business_name'),
            "categoryType"=> $request->get('business_type'),
            "country"=> $request->get('country'),
            "district"=> $request->get('district'),
            "capital"=> $request->get('capital'),
            "dateOpened" => $request->get('date_opened'),
            "userId"=> "1",
        ]);

        $businessCategory->save();
        return view('layouts.editBusiness');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessCategory $businessCategory)
    {
        //
    }

    public function getBusinessCategories(){
        $businesses = BusinessCategory::all();
        return view('layouts.editBusiness', compact('businesses'));
    }
}
