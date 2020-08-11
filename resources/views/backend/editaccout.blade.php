<!DOCTYPE html>
<html>
<head>
    <title>Edit Accout</title>
   <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@if(Auth::user() == null)
    @else
        <div class="container">
            <a class="navbar-brand" href="#">
            Hello:{{Auth::user()->email}}
            <a href="{{asset('logout')}}">{{ trans('message.out') }}</a></a>
        </div>
@endif
    <div class="from-group" id="editaccout">
        <form method="post">
            {{csrf_field()}}
            <div class="form-group" >
                <label>{{ trans('message.email') }}</label>
                <input required type="text" name="email" class="form-control" value="{{$users->email}}">
            </div>
            <div class="form-group" >
                <label>{{ trans('message.pass') }}</label>
                <input required type="text" name="password" class="form-control" value="{{$users->password}}">
            </div>
            <div class="form-group" >
                <label>{{ trans('message.level') }}</label>
                <input required type="text" name="level" class="form-control" value="{{$users->level}}">
            </div>
            <input type="submit" name="submit" class=" btn btn-primary" value="{{ __('message.sua')}}">
        </form>
    </div>
</body>
</html>
