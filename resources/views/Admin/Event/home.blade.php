@extends('Admin.master')
@section('title', 'Events')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(session('mess'))
            <p class="alert alert-success">{{ session('mess') }}</p>
        @else
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h3 class="h2">{{ __('Quản lý sự kiện') }}</h3>
            </div>
        @endif
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('event.create') }}">
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
                    <th>{{ __('Percent') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event['id'] }}</td>
                        <td>{{ $event['nameEvent'] }}</td>
                        <td>{{ $event['percent'] }}</td>
                        <td>
                            <img src="{{ $event['imageEvent'] }}" width="200" height="70">
                        </td>
                        <td>
                            <a href="{{ route('event.edit',$event->id) }}" class="btn btn-info">{{ __('Edit') }}</a>
                            <a href="{{ route('event.destroy',$event->id) }}"
                               class="btn btn-danger">{{ __('Delete') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

