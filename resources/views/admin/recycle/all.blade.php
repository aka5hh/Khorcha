@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>Recycle Bin
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                        <thead class="table-dark">
                            <tr>
                                <th>Name</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Users</td>
                                <td>
                                    <div class="btn-group btn_group_manage" role="group">
                                        <a href="{{ url('dashboard/recycle/user') }}"class="btn btn-dark">Open</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Income Category</td>
                                <td>
                                    <div class="btn-group btn_group_manage" role="group">
                                        <a href="{{ url('dashboard/recycle/income/category') }}"class="btn btn-dark">Open</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Income</td>
                                <td>
                                    <div class="btn-group btn_group_manage" role="group">
                                        <a href="{{ url('dashboard/recycle/income') }}"class="btn btn-dark">Open</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense Category</td>
                                <td>
                                    <div class="btn-group btn_group_manage" role="group">
                                        <a href="{{ url('dashboard/recycle/expense/category') }}"class="btn btn-dark">Open</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Expense</td>
                                <td>
                                    <div class="btn-group btn_group_manage" role="group">
                                        <a href="{{ url('dashboard/recycle/expense') }}"class="btn btn-dark">Open</a>
                                    </div>
                                </td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
