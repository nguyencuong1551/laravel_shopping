@extends('Admin.master')
@section('title', 'Home Product')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(session('mess'))
            <p class="alert alert-success">{{ session('mess') }}</p>
        @else
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3 class="h2 text-danger">{{ __('Tìm thấy') }} {{ count($products) }} {{ __('cho từ khóa') }}
                    : {{$key}}</h3>
            </div>
        @endif
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('product.create') }}">
                <span data-feather="calendar"></span>
                {{ __('ADD') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('name') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th>{{ __('Unit_price') }}</th>
                    <th>{{ __('Promotion_price') }}</th>
                    <th>{{ __('Id_category') }}</th>
                    <th>{{ __('Id_event') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product['id'] }}</td>
                        <td>{{ $product['name'] }}</td>
                        <td>
                            <center><img src="{{ $product['image'] }}" width="100" height="70"></center>
                        </td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['unit_price'] }}</td>
                        <td>{{ $product['promotion_price'] }}</td>
                        <td>{{ $product['id_category'] }}</td>
                        <td>{{ $product['id_event'] }}</td>
                        <td>
                            <a href="{{ route('product.edit', $product['id']) }}"
                               class="btn btn-info">{{ __('Edit') }}</a>
                            <a href="{{ route('product.destroy', $product['id']) }}"
                               class="btn btn-danger">{{ __('Delete') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

