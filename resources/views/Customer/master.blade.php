<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    @yield('title')
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
        <ul class="navbar-nav px-3"><li class="nav-item text-nowrap">
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
                <a class="nav-link" >{{ $user['name'] }}</a>
            </li>
        </ul>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="{{ route('customer.user.logout') }}">{{ __('Logout') }}</a>
            </li>
        </ul>
    @else
        <ul class="navbar-nav px-3"><li class="nav-item text-nowrap">
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

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="layers"></span>
                            {{ __('Danh Mục Sản Phẩm') }} <span class="sr-only">({{ __('current') }})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        @foreach($category0 as $x)
                            <a class="nav-link" href="{{ route('customer.category.index',$x->id) }}"><span data-feather="shopping-cart"></span>{{ $x->name }}</a>
                    </li>
                        @endforeach
                    <li class="nav-item dropright">
                        <a class="nav-link dropdown-toggle"  href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="shopping-cart"></span>{{ __('Laptop') }}</a>
                        <div class="dropdown-menu" >
                            @foreach($category1 as $x)
                                <a class="dropdown-item" href="{{ route('customer.category.index',$x->id) }}">{{ $x->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropright">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="shopping-cart"></span>{{ __('Thiết bị di động') }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            @foreach($category2 as $x)
                                <a class="dropdown-item" href="{{ route('customer.category.index',$x->id) }}">{{ $x->name }}</a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropright">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="shopping-cart"></span>{{ __('Thiết bị IT') }}</a>
                        <div class="dropdown-menu">
                            @foreach($category3 as $x)
                                <a class="dropdown-item" href="{{ route('customer.category.index',$x->id) }}">{{ $x->name }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{{ __('Saved reports') }}</span>
                    <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span>
                            {{ __('Customers') }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
</div>
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
                <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
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
                        <img src="https://banner2.kisspng.com/20171216/213/facebook-logo-png-5a35528eaa4f08.7998622015134439826976.jpg"
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
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script src="https://getbootstrap.com/docs/4.4/examples/dashboard/dashboard.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="https://getbootstrap.com/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>
</html>


