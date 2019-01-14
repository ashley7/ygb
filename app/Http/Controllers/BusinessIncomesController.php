<?php

namespace App\Http\Controllers;
use App\layouts;
use App\BusinessIncomes;
use App\BusinessMembers;
use App\BusinessCategory;
use Illuminate\Http\Request;

class BusinessIncomesController extends Controller
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
        
        return view('layouts.addincome', compact('businesses','members'));
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
        //adding incomes from businesses
        $income = new BusinessIncomes([
            "categoryId"=> $request->get('business_name'),
            "memberId"=> $request->get('paidBy'),
            "userId"=> "1",
            "Amount"=> $request->get('amount'),
            "Reason"=> $request->get('reason'),
            "paymentTime"=> $request->get('datePaid'),
        ]);

        $income->save();
        return view('layouts.editIncome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessIncomes  $businessIncomes
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessIncomes $businessIncomes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessIncomes  $businessIncomes
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessIncomes $businessIncomes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessIncomes  $businessIncomes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessIncomes $businessIncomes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessIncomes  $businessIncomes
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessIncomes $businessIncomes)
    {
        //
    }

    public function getBusinessIncomes(){
        //$incomes = BusinessIncomes::where('userId','1')->get();
        

        $incomes = BusinessIncomes::select("incomes.Amount","incomes.paymentTime","incomes.Reason",'businessCategory.categoryName',"businessMembers.lastName","businessMembers.firstName")->where('incomes.userId', '1')->leftJoin("businessCategory","businessCategory.categoryId","=","incomes.categoryId")->leftJoin("businessMembers","businessMembers.memberId","=","incomes.memberId")->orderBy('incomes.incomeId', 'DESC')->get();

        return view('layouts.editIncome', compact('incomes'));
    }
}
