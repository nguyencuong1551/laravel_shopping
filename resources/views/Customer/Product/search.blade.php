@extends('Customer.master')
@section('title', "{{ __('shop') }}")
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($events as $event)
                    <div class="carousel-item ">
                        <div class="container">
                            <div class="carousel-caption text-right">
                                <p><a class="btn btn-lg btn btn-outline-light"
                                      href="{{ route('customer.event.index',$event->id) }}" role="button">Sale up to
                                        {{ $event->percent }}%</a></p>
                            </div>
                        </div>
                        <img src="{{ $event->imageEvent }}" style="width: 100%;height: 290px">
                    </div>
                @endforeach
                <div class="carousel-item active">
                    <img src="https://media3.scdn.vn/img4/2020/06_01/2hmryfRJIst1qa3nyjix.png"
                         style="width: 100%;height: 290px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('Previous') }}</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('Next') }}</span>
            </a>
        </div>
        <hr class="featurette-divider">
        {{--        <?php if (isset($_SESSION['status'])):?>--}}
        {{--        <center><p class="alert alert-info"><?= $_SESSION['status']  ?></p></center>--}}
        {{--        <?php endif; unset($_SESSION['status']) ?>--}}
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h3 class="h2 text-danger">{{ __('Tìm thấy') }} {{ count($products) }} {{ __('sản phẩm cho từ khóa') }}
                : {{$key}}</h3>
        </div>

        <div id="showCategoryProduct">
            <div class="row col-auto">
                @foreach($products as $product)
                    <div class="col-3">
                        <div class="card flex-row mb-2 shadow-sm h-md-150">
                            <div class="card-body d-flex flex-column align-items-start">
                                <center><a href=""><img
                                            src="{{ $product->image }}"
                                            height="130" width="180"></a></center>
                                <br>
                                <strong class="d-inline-block mb-2 text-dark">{{ $product->name }}</strong>
                                <div class="text-muted">{{ __('Giá') }}: <strike>{{ $product->unit_price }}$</strike>
                                </div>
                                <div class="mb-1 text-danger">{{ __('Giá khuyến mại') }}
                                    : {{ $product->promotion_price }} $
                                </div>
                                <br>
                                <p>
                                    <a class="btn btn-outline-dark mb-1"
                                       href="{{ route('customer.product.index',$product->id) }}">{{ __('Thông tin') }}
                                        &raquo</a>
                                    <a class="btn btn-outline-dark mb-1"
                                       href="{{ route('customer.cart.create',$product->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="23"
                                             viewBox="0 0 24 24">
                                            <path
                                                d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z"/>
                                        </svg>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr class="featurette-divider">
            <div class="d-flex justify-content-between align-items-center">
                <div></div>
                <div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>
@endsection


