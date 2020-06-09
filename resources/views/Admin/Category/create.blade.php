@extends('Admin.master')
@section('title', 'create Category')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(isset($mess))
            <p class="alert alert-success">{{ $mess }}</p>
        @else
            <div class=" pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ __('Add Category') }} </h1>
            </div>
        @endif

        <div class="container">
            <form class="needs-validation" action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">{{ __('Name') }}:</label>
                    <input type="text" class="form-control" id="email" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Category') }}:</label>
                    <select name="id_parent" required>
                        <option value="0">{{ __('Macbook') }}</option>
                        <option value="1">{{ __('Laptop') }}</option>
                        <option value="2">{{ __('Thiết bị di động') }}</option>
                        <option value="3">{{ __('Thiết bị IT') }}</option>
                    </select>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit"
                        name="submit">{{ __('Continue to ADD') }}</button>
            </form>
        </div>
    </main>
@endsection

