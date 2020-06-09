
    <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
<form class="form-signin" action="{{ route('customer.user.checkUser') }}" method="post">
    @csrf
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72"
         height="72">
    @if(session('mess'))
        <p class="alert alert-success"> {{ session('mess') }} </p>
    @else
        <h1 class="h3 mb-3 font-weight-normal">{{ __('Please register') }}</h1>
    @endif
    @if($errors)
        @foreach($errors->all() as $error)
            <p class="alert alert-danger"> {{ $error }} </p>
        @endforeach
    @endif
    @if(session('status'))
        <p class="alert alert-danger">{{ session('status') }}</p>
    @endif
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" class="form-control" placeholder="Email address" name="email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" class="form-control" placeholder="Password" name="password">
    <div class="checkbox mb-3">
        <label>
            <a href="{{ route('customer.user.create') }}"><i>Chưa có tài khoản?</i></a>
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>
