@extends('Admin.master')
@section('title', 'Edit Product')
@section('content')
    <br>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @if(isset($mess))
            <p class="alert alert-success">{{ $mess }}</p>
        @else
            <div class=" pb-2 mb-3 border-bottom">
                <h1 class="h2">{{ __('Edit Product') }}</h1>
            </div>
        @endif

        <div class="container">
            <form class="needs-validation" action="{{ route('product.update',$product->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email">{{ __('Name') }}:</label>
                    <input type="text" class="form-control" id="email" name="name" value="{{ $product['name'] }}"
                           required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Image') }}:</label> <img src="{{ $product['image'] }}" width="100"
                                                                       height="50" alt="">
                    <input type="text" class="form-control" id="email" name="image" value="{{ $product['image'] }}"
                           required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Image1') }}:</label> <img src="{{ $product['image1'] }}" width="100"
                                                                        height="50" alt="">
                    <input type="text" class="form-control" id="email" name="image1" value="{{ $product['image1'] }}"
                           required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Image2') }}:</label> <img src="{{ $product['image2'] }}" width="100"
                                                                        height="50" alt="">
                    <input type="text" class="form-control" id="email" name="image2" value="{{ $product['image2'] }}"
                           required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Image3') }}:</label> <img src="{{ $product['image3'] }}" width="100"
                                                                        height="50" alt="">
                    <input type="text" class="form-control" id="email" name="image3" value="{{ $product['image3'] }}"
                           required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Description') }}:</label>
                    <input name="description" class="form-control" value="{{ $product['description'] }}" required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Unit_price') }}:</label>
                    <input type="text" class="form-control" id="email" name="unit_price"
                           value="{{ $product['unit_price'] }}" required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Promotion_price') }}:</label>
                    <input type="text" class="form-control" id="email" name="promotion_price"
                           value="{{ $product['promotion_price'] }}" required>
                </div>
                <div class="mb-3">
                    <label for="email">{{ __('Category') }}:</label>
                    <select name="id_category" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category['id'] }}">{{ $category['name']}}</option>
                        @endforeach
                    </select>
                    <label for="email">{{ __('Event') }}:</label>
                    <select name="id_event" required>
                        <option value="0">{{ __('Không thuộc sự kiện nào') }}</option>
                        @foreach ($events as $event)
                            <option value="{{ $event['id'] }}">{{ $event['percent']}}%</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit"
                name="submit">{{ __('Continue to ADD') }}</button>
        </form>
    </main>
@endsection

