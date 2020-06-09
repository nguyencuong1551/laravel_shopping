@extends('Admin.master')
@section('title', 'Comments')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(session('mess'))
            <p class="alert alert-success">{{ session('mess') }}</p>
        @else
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3 class="h2">{{ __('Quản lý bình luận') }}</h3>
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
                    <th>{{ __('description') }}</th>
                    <th>{{ __('Name_user') }}</th>
                    <th>{{ __('Id_product') }}</th>
                    <th>{{ __('RoleUser') }}</th>
                    <th>{{ __('Vote') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>{{ $comment['id'] }}</td>
                        <td>{{ $comment['description'] }}</td>
                        <td>{{ $comment['name_user'] }}</td>
                        <td>{{ $comment['id_product'] }}</td>
                        <td>{{ $comment['roleUser'] }}</td>
                        <td>{{ $comment['vote'] }}</td>
                        <td>
                            <a href="#" class="btn btn-info">{{ __('Edit') }}</a>
                            <a href="#" class="btn btn-danger">{{ __('Delete') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

