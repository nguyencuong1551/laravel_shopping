@extends('Admin.master')
@section('title', 'Categories')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(session('mess'))
            <p class="alert alert-success">{{ session('mess') }}</p>
        @else
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3 class="h2">{{ __('Quản lý danh mục') }}</h3>
            </div>
        @endif
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('category.create') }}">
                <span data-feather="calendar"></span>
                {{ __('ADD') }}
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Id_parent') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['id_parent'] }}</td>
                        <td>
                            <a href="{{ route('category.edit',$category->id) }}"
                               class="btn btn-info">{{ __('Edit') }}</a>
                            <a href="{{ route('category.destroy',$category->id) }}"
                               class="btn btn-danger">{{ __('Delete') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

