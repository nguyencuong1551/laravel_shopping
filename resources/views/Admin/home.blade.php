@extends('Admin.master')
@section('title', 'Home')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
            <h1 class="h2">{{ __('Thống kê') }}</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('Sản phẩm') }}</th>
                    <th>{{ __('Danh mục') }}</th>
                    <th>{{ __('Sự kiện') }}</th>
                    <th>{{ __('Đơn hàng') }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>#</td>
                    <td>{{ $products }}</td>
                    <td>{{ $categories }}</td>
                    <td>{{ $events }}</td>
                    <td>{{ $bills }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </main>
@endsection

