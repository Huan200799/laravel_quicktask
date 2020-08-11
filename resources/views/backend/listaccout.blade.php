<!DOCTYPE html>
<html>
<head>
    <title>List Accout</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- CSS And JavaScript -->
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
    <div id="listaccout">
    <table>
        <tr>
            <td id="id">{{ trans('message.id') }}</td>
            <td id="email">{{ trans('message.email') }}</td>
            <td>{{ trans('message.pass') }}</td>
            <td id="level">{{ trans('message.level') }}</td>
            <td>{{ __('message.delete')}}</td>
            <td>{{ __('message.sua')}}</td>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->level}}</td>
                <td><a href="{{asset('admin/delaccout/'.$user->id)}}"><input type="submit" name="submit" class="btn btn-danger" value="{{ __('message.delete')}}"></a></td>
                 <td><a href="{{asset('admin/editaccout/'.$user->id)}}"><input type="submit" name="submit" class="btn btn-danger" value="{{ __('message.sua')}}"></a></td>
            </tr>
        @endforeach
    </table>
        @if($users->hasPages())
        {{ $users->links() }}
        @endif
    </div>
</body>
</html>
