<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Detail product</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->

    <link href="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('welcome') }}">{{ __('Shopping') }}</a>
    <form class="w-100" action="{{ route('customer.product.search') }}" method="get">
        @csrf
        <input class="form-control form-control-dark " name="key" type="text" placeholder="{{ __('Search') }}"
               aria-label="Search">
    </form>
    @if($user)
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                @if(isset($cart))
                    <a class="nav-link" href="{{ route('customer.cart.index') }}"><strong>{{ count($cart) }}</strong>
                        <svg xmlns="http:/www.w3.org/2000/svg" width="38" height="23"
                             viewBox = "0 0 24 24" >
                            <path d = "M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" />
                        </svg >
                    </a>
                @else
                    <a class="nav-link" href="{{ route('customer.cart.index') }}"><strong>0</strong>

                        <svg xmlns="http:/www.w3.org/2000/svg" width="38" height="23"
                             viewBox = "0 0 24 24" >
                            <path d = "M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" />
                        </svg >
                    </a>
                @endif
            </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link">{{ $user['name'] }}</a>
            </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('customer.user.logout') }}">{{ __('Logout') }}</a>
            </li>
        </ul>
    @else
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                @if(isset($cart))
                    <a class="nav-link" href="{{ route('customer.cart.index') }}"><strong>{{ count($cart) }}</strong>
                        <svg xmlns="http:/www.w3.org/2000/svg" width="38" height="23"
                             viewBox = "0 0 24 24" >
                            <path d = "M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" />
                        </svg >
                    </a>
                @else
                    <a class="nav-link" href="{{ route('customer.cart.index') }}"><strong>0</strong>

                        <svg xmlns="http:/www.w3.org/2000/svg" width="38" height="23"
                             viewBox = "0 0 24 24" >
                            <path d = "M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" />
                        </svg >
                    </a>
                @endif
            </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('customer.user.login') }}">{{ __('Login') }}</a>
            </li>
        </ul>
    @endif
</nav>
<main role="main">
    <br><br><br>
    <div class="container marketing">
        <!-- START THE FEATURETTES -->
        <div class="row">
            <div class="col-md-1 order-md-2"></div>
            @foreach($product as $x)
                <div class="col-md-7 order-md-2">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="featurette-heading">{{ $x['name'] }}</h3>
                        </div>
                        <div class="col-md-6">
                            <p>{{ __('Danh mục') }}: <a
                                    href='{{ route('customer.category.index',$category->id) }}'>{{ $category['name'] }}</a>
                            </p>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="mb-1 text-muted">{{ __('Giá') }}: <strike>{{ $x->unit_price }}$</strike></h5>
                            <h4 class="mb-1 text-danger">{{ __('Giá khuyến mại') }}: {{ $x->promotion_price }}$</h4>
                            <br>
                            <h6 class="mb-1 text-muted"><img
                                    src="https://iquatcongnghiep.vn/vnt_upload/File/04_2018/chinh-hang.png"
                                    width="25"
                                    height="25"> {{ __('Hàng chính hãng') }} 100%</h6>
                            <h6 class="mb-1 text-muted"><img
                                    src="https://salt.tikicdn.com/assets/events/nha-ban-le/wd-kingston/img/feature-icon-4.jpg"
                                    width="25"
                                    height="25"> {{ __('7 ngày miễn phí trả hàng') }}</h6>
                            <br>
                            <a class="btn btn-lg btn-warning"  href="{{ route('customer.cart.create',$x->id) }}"
                               role="button" style="width: 100%">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="30" viewBox="0 0 24 24">
                                    <path
                                        d="M6 23.73l-3-2.122v-14.2l3 1.359v14.963zm2-14.855v15.125l13-1.954v-15.046l-13 1.875zm5.963-7.875c-2.097 0-3.958 2.005-3.962 4.266l-.001 1.683c0 .305.273.54.575.494.244-.037.425-.247.425-.494v-1.681c.003-1.71 1.416-3.268 2.963-3.268.537 0 1.016.195 1.384.564.422.423.654 1.035.653 1.727v1.747c0 .305.273.54.575.494.243-.037.423-.246.423-.492l.002-1.749c.002-1.904-1.32-3.291-3.037-3.291zm-6.39 5.995c.245-.037.427-.247.427-.495v-2.232c.002-1.71 1.416-3.268 2.963-3.268l.162.015c.366-.283.765-.513 1.188-.683-.405-.207-.858-.332-1.35-.332-2.096 0-3.958 2.005-3.962 4.266v2.235c0 .306.272.538.572.494z"/>
                                </svg>
                                <strong>{{ __('Thêm vào giỏ hàng') }}</strong>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group bg-dark">
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="http://cdn.nhanh.vn/cdn/store/26/art/article_1479956944_813.jpg"
                                                 width="100%" height="35">
                                        </div>
                                        <div class="col-md-9">
                                            <h6 class="text-muted text-sm-left">
                                                <span><strong>{{ __('Giao hàng miễn phí') }}</strong> {{ __('cho đơn hàng trên') }} 10$</span>
                                            </h6>
                                            <h6 class="text-muted text-sm-left">
                                                <span>{{ __('Nhận hàng từ 6 đến 24h sau khi đặt hàng') }}</span>
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img
                                                src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/phone-call-active-512.png"
                                                width="30" height="30">
                                        </div>
                                        <div class="col-md-9">
                                            <h6 class="text-sm-left"><strong>{{ __('Liên hệ') }}</strong></h6>
                                            <h6 class="text-muted text-sm-left"><span>{{ __('Hotline đặt hàng') }} <br>1800 6963 ({{ __('Miễn phí, 8-21h cả T7, CN') }})</span>
                                            </h6>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 order-md-1">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <center><img src="{{ $x->image }}" width="270" height="200"></center>
                            </div>
                            <div class="carousel-item">
                                <center><img src="{{ $x->image1 }}" width="270" height="200"></center>
                            </div>
                            <div class="carousel-item">
                                <center><img src="{{ $x->image2 }}" width="270" height="200"></center>
                            </div>
                            <div class="carousel-item">
                                <center><img src="{{ $x->image3 }}" width="270" height="200"></center>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <ol class="carousel-indicators">
                        <div class="row">
                            <div class="col-md-3">
                                <a data-target="#myCarousel" data-slide-to="0" class="active"><img
                                        src="{{ $x->image }}"
                                        width="45" height="35"></a>
                            </div>
                            <div class="col-md-3">
                                <a data-target="#myCarousel" data-slide-to="1" class="active"><img
                                        src="{{ $x->image1 }}"
                                        width="45" height="35"></a>
                            </div>
                            <div class="col-md-3">
                                <a data-target="#myCarousel" data-slide-to="2" class="active"><img
                                        src="{{ $x->image2 }}"
                                        width="45" height="35"></a>
                            </div>
                            <div class="col-md-3">
                                <a data-target="#myCarousel" data-slide-to="3" class="active"><img
                                        src="{{ $x->image3 }}"
                                        width="45" height="35"></a>
                            </div>
                        </div>
                    </ol>
                </div>
        </div>
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-12">
                <h2 class="featurette-heading">{{ __('Mô tả sản phẩm') }}</h2><br>
                <div class="row featurette">
                    <div class="col-md-12">
                        <p><span><h4> {{ __('Đang cập nhật') }}... {{ $x->description }}</h4></span></p>
                        <br>
                        <div id="Carousel1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <center><img src="{{ $x->image }}" width="600" height="400"></center>
                                </div>
                                <div class="carousel-item ">
                                    <center><img src="{{ $x->image1 }}" width="600" height="400"></center>
                                </div>
                                <div class="carousel-item ">
                                    <center><img src="{{ $x->image2 }}" width="600" height="400"></center>
                                </div>
                                <div class="carousel-item ">
                                    <center><img src="{{ $x->image3 }}" width="600" height="400"></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <hr class="featurette-divider">
        <div class="row featurette">
            <div class="col-md-12 order-md-2">
                <h2 class="featurette-heading">{{ __('Đánh giá sản phẩm') }}</h2>
                @if(session('mess'))
                    <p class="alert alert-success">{{ session('mess') }}</p>
                @else
                    <h6 class="border-bottom border-gray pb-2 mb-0">{{ __('Bình luận') }}</h6>
                @endif
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    @foreach($comments as $comment)
                        @if($comment->roleUser == 'admin')
                            <div class="media text-muted pt-3">
                                <img src='https://img.atpsoftware.vn/2019/04/1-160-350x250.png' width='40' height='28'>
                                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                    <strong class="d-block text-danger">{{ $comment->name_user }}</strong>
                                    <i>{{ $comment->description }}</i>
                                </p>
                                {{ $comment->created_at }}
                            </div>
                        @else
                            @if(isset($user) && $user['role'] == 'admin')
                                <div class="media text-muted pt-3">
                                    <img src="https://st.quantrimang.com/photos/image/2019/12/28/Windows-10-truy-cap-nhanh-User-200.jpg" width="32px" height="32px">
                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <strong class="d-block text-gray-dark">
                                            {{ $comment->name_user }} &nbsp;&nbsp;&nbsp;&nbsp; <span
                                                class='text-info'>{{ $comment->vote }}</span></strong>
                                        {{ $comment->description }}
                                    </p>
                                    {{ $comment->created_at }} <br>
                                    <a class=' btn btn-danger'
                                       href='http://127.0.0.1:8001/customer/product/{{$id}}/comment/{{$comment->id}}'>Delete</a>
                                </div>
                            @else
                                <div class="media text-muted pt-3">
                                    <img src="https://st.quantrimang.com/photos/image/2019/12/28/Windows-10-truy-cap-nhanh-User-200.jpg" width="32px" height="32px">
                                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                        <strong class="d-block text-gray-dark">
                                            {{ $comment->name_user }} &nbsp;&nbsp;&nbsp;&nbsp; <span
                                                class='text-info'>{{ $comment->vote }}</span></strong>
                                        {{ $comment->description }}
                                    </p>
                                    {{ $comment->created_at }} <br>
                                </div>
                            @endif
                        @endif
                    @endforeach

                    <div class="d-flex justify-content-between align-items-center">
                        <div></div>
                        <div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    {{ $comments->links() }}
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    @if(isset($user))
                        <div class="col-md-12">
                            <form method='post' action='{{ route('customer.comment.store',$id) }}'>
                                @csrf
                                <h5>{{ __('Vote') }}: </h5>
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <div class="custom-control custom-radio">
                                            <input value="Rất Tốt" id="credit" name="vote" type="radio"
                                                   class="custom-control-input" required>
                                            <label class="custom-control-label" for="credit">{{ __('Rất Tốt') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="custom-control custom-radio">
                                            <input value="Bình thường" id="debit" name="vote" type="radio"
                                                   class="custom-control-input" required>
                                            <label class="custom-control-label"
                                                   for="debit">{{ __('Bình thường') }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <div class="custom-control custom-radio">
                                            <input value="Rất tệ" id="paypal" name="vote" type="radio"
                                                   class="custom-control-input" required>
                                            <label class="custom-control-label" for="paypal">{{ __('Rất tệ') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="username"><strong>{{ __('Viết Bình luận') }} ...</strong></label>
                                    <div class="input-group">
           <textarea type="text" class="form-control" placeholder="..." required
                     name="description" id="" cols="30" rows="1"></textarea>
                                        <div class="invalid-feedback" style="width: 100%;">
                                            {{ __('Your username is required') }}.
                                        </div>
                                        <div class="input-group-prepend">
                                            <a href=""><span class="input-group-text">@</span></a>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name='submit'>
                                    {{ __('Continue to comment') }}
                                </button>
                            </form>
                        </div>
                    @else
                        <center><h4><span>{{ __('Đăng nhập để viết bình luận') }}...</span></h4></center>
                    @endif
                </div>
            </div>
            <hr class="featurette-divider">
        </div>
    </div>
    <!-- FOOTER -->
</main>
<hr class="featurette-divider">
<!-- FOOTER -->
<footer class="container py-5">
    <div class="row">
        <div class="col-12 col-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none"
                 stroke="currentColor"
                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2"
                 role="img"
                 viewBox="0 0 24 24" focusable="false"
                 href="https://www.facebook.com/profile.php?id=100007509827423"><title>{{ __('Product') }}</title>
                <circle cx="12" cy="12" r="10"/>
                <path
                    d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
            </svg>
            <small class="d-block mb-3 text-muted">&copy; 2018-2019</small>
        </div>
        <div class="col-6 col-md">
            <h5>{{ __('Admin') }}</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="{{Route('home')}}">Nguyễn Cường</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>{{ __('Số Điện Thoại') }}</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted">038.343.8868</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>{{ __('Địa Chỉ') }}</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted">{{ __('Hà Nội') }}</a></li>
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>{{ __('Kết Nối') }}</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted"
                       href="https://www.facebook.com/profile.php?id=100007509827423">
                        <img
                            src="https://banner2.kisspng.com/20171216/213/facebook-logo-png-5a35528eaa4f08.7998622015134439826976.jpg"
                            width="60" height="35">
                    </a>
                    <a class="text-muted"
                       href="https://www.instagram.com/cuongit151097/?hl=vi">
                        <img src="https://img.freepik.com/free-vector/instagram-icon_1057-2227.jpg?size=338&ext=jpg"
                             width="35" height="35">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
        crossorigin="anonymous"></script>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
        crossorigin="anonymous"></script>
</body>
</html>


