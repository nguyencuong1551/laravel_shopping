@extends('Admin.master')
@section('title', 'Bills')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(session('mess'))
            <p class="alert alert-success">{{ session('mess') }}</p>
        @else
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3 class="h2">{{ __('Quản lý đơn hàng') }}</h3>
            </div>
        @endif
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="#">
                <span data-feather="calendar"></span>
                {{ __('ADD') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Id_user') }}</th>
                    <th>{{ __('Total') }}</th>
                    <th>{{ __('Note') }}</th>
                    <th>{{ __('Payment') }}</th>
                    <th>{{ __('Time') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($bills as $bill)
                    <tr>
                        <td>{{ $bill['id'] }}</td>
                        <td>{{ $bill['id_user'] }}</td>
                        <td>{{ $bill['total'] }}</td>
                        <td>{{ $bill['note'] }}</td>
                        <td>{{ $bill['payment'] }}</td>
                        <td>{{ $bill['payment'] }}</td>
                        <td>{{ $bill['created_at'] }}</td>
                        <td>
                            <a href="{{ route('bill.detail',['id'=>$bill->id,'idUser'=>$bill->id_user]) }}" class="btn btn-info">{{ __('chi tiết') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

