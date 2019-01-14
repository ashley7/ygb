@extends('main')

@section('content')
<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Businessess Registered</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Business Name</th>
                                                    <th>Amount</th>
                                                    <th>Reason</th>
                                                    <th>Name</th>
                                                    <th>Payment Time</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>

                                     
                                            <tbody>
                                            @foreach($incomes as $income)
                                                <tr>
                                                    <td>{{$income['categoryName']}}</td>
                                                    <td>{{$income['Amount']}}</td>
                                                    <td>{{$income['Reason']}}</td>
                                                    <td>{{$income['lastName']}} {{$income['firstName']}}</td>
                                                    <td>{{$income['paymentTime']}}</td>
                                                    <td><button class="btn btn-icon btn-success m-b-5 edit-station-button" data-toggle="modal" id="{{htmlspecialchars(json_encode($income))}}" data-target="#full-width-modal"  data-delete-link="" > <i class="fa fa-thumbs-o-up"></i> Edit </button></td>
                                                </tr>
                                                @endforeach    
                                                
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection