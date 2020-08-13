<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel Quickstart - Basic</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- CSS And JavaScript -->
</head>

<body>
@if(Auth::user() == null)
    <div id="auth">
        <a href="{{asset('login')}}"><input type="" name="" class="btn btn-primary" value="{{ __('message.dn')}}"></a>
        <a href="{{asset('signin')}}"><input type="" name="" class="btn btn-primary" value="{{ __('message.dk')}}"></a>
    </div>
@else
    <div class="container">
        <a class="navbar-brand" href="#">
        Hello:{{Auth::user()->email}}
        <a href="{{asset('logout')}}">{{ trans('message.out') }}</a></a>
    </div>
@endif
    @yield('content')
</body>
</html>
