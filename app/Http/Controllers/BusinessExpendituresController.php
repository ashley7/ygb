<?php

namespace App\Http\Controllers;
use App\layouts;
use App\BusinessExpenditures;
use App\BusinessMembers;
use App\BusinessCategory;
use Illuminate\Http\Request;

class BusinessExpendituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = BusinessMembers::where('userId',1)->get();
        $businesses = BusinessCategory::where('userId',1)->get();
        
        return view('layouts.addExpenditures', compact('businesses','members'));
        //return view('layouts.addExpenditures');
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
        //saving the expenditures incurred on given businesses
        $addExpenditures = new BusinessExpenditures([
            "categoryId"=> $request->get('business_name'),
            "memberId"=> $request->get('paidBy'),
            "userId"=> "1",
            "Amount"=> $request->get('amount'),
            "Reason"=> $request->get('reason'),
            "paymentTime"=> $request->get('datePaid'),
        ]);
        $addExpenditures->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessExpenditures  $businessExpenditures
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessExpenditures $businessExpenditures)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessExpenditures  $businessExpenditures
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessExpenditures $businessExpenditures)
    {
        return view('layouts.editExpenditures');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessExpenditures  $businessExpenditures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessExpenditures $businessExpenditures)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessExpenditures  $businessExpenditures
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessExpenditures $businessExpenditures)
    {
        //
    }

    public function getBusinessExpenditures(){
       

        $expenditures = BusinessExpenditures::select("expenditures.Amount","expenditures.paymentTime","expenditures.Reason",'businessCategory.categoryName',"businessMembers.lastName","businessMembers.firstName")->where('expenditures.userId', '1')->leftJoin("businessCategory","businessCategory.categoryId","=","expenditures.categoryId")->leftJoin("businessMembers","businessMembers.memberId","=","expenditures.memberId")->orderBy('expenditures.expenditureId', 'DESC')->get();

        return view('layouts.editExpenditures', compact('expenditures'));
    }
}
