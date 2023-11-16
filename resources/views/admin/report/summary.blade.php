@extends('layouts.admin')
@section('content')
@php
    $allIncome=App\Models\Income::where('income_status',1)->orderBy('income_date','DESC')->get();
    $allExpense=App\Models\Expense::where('expense_status',1)->orderBy('expense_date','DESC')->get();
@endphp
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>Income Expense Summary
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{ url('dashboard/income') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All INCOME</a>
                            <a href="{{ url('dashboard/expense') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All EXPENSE</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert_success" role="alert">
                                    <strong>Success!</strong> {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger alert_error" role="alert">
                                    <strong>Opps!</strong> {{ Session::get('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <table id="allTableDesc" class="table table-bordered table-striped table-hover custom_table">
                        <thead class="table-dark">
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Amount</th>
                                <th>Expense</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allIncome as $income)
                                <tr>
                                    <td>{{ date('d-M-Y',strtotime($income->income_date))}}</td>
                                    <td>{{ $income->income_title }}</td>
                                    <td>{{ $income->categoryInfo->incate_name }}</td>
                                    <td>{{ number_format($income->income_amount,2) }}</td>
                                    <td></td>                                  
                                </tr>
                            @endforeach
                            @foreach ($allExpense as $expense)
                                <tr>
                                    <td>{{ date('d-M-Y',strtotime($expense->expense_date))}}</td>
                                    <td>{{ $expense->expense_title }}</td>
                                    <td>{{ $expense->categoryInfo->expcate_name }}</td>
                                    <td></td>                                  
                                    <td>{{ number_format($expense->expense_amount,2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $all->links()}} //pagination --}}
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <button type="button" onclick="window.print()" class="btn btn-sm btn-dark">Print</button>
                        <a href="{{url('dashboard/income/pdf')}}"  class="btn btn-sm btn-secondary">PDF</a>
                        <a href="{{url('dashboard/income/excel')}}" type="button" class="btn btn-sm btn-dark">Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- delete modal code -->
    <div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{url('dashboard/income/softdelete')}}" method="POST">
                @csrf
                <div class="modal-content modal_content">
                    <div class="modal-header modal_header">
                        <h1 class="modal-title modal_title" id="softDeleteModalLabel"><i class="fab fa-gg-circle"></i>Confirm Message</h1>
                    </div>
                    <div class="modal-body modal_body">
                        Do you want to delete this income ?
                        <input type="hidden" name="modal_id" id="modal_id"/>
                    </div>
                    <div class="modal-footer modal_footer">
                        <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
