@extends('Admin.master')
@section('title', 'create Event')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(isset($mess))
            <p class="alert alert-success">{{ $mess }}</p>
        @else
            <div class=" pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ __('Add Event') }} </h1>
            </div>
        @endif

        <div class="container">
            <form class="needs-validation" action="{{ route('event.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">{{ __('Name') }}:</label>
                    <input type="text" class="form-control" id="email" name="nameEvent" required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Percent') }}:</label>
                    <input type="number" class="form-control" name="percent" min="1" max="100" required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Image') }}:</label>
                    <input type="text" class="form-control" id="email" name="imageEvent" required>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" >{{ __('Continue to ADD') }}</button>
            </form>
        </div>
    </main>
@endsection

