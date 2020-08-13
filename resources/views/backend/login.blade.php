@extends('layouts.app')

@section('content')
<div  id="login">
        <div class="">
         @include('common.errors')
            <div class="login-panel panel panel-default">
                <h1 id="login-h1">Login</h1>
                <div class="panel-body">
                    <form role="form" method="post">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="form-group" id="login-email">
                                <input class="form-control" placeholder="{{ __('message.email')}}" name="email" type="email" autofocus="" value="{{old('email')}}">
                            </div>
                            <div class="form-group" id="login-password">
                                <input class="form-control" placeholder="{{ __('message.pass')}}" name="password" type="password" value="">
                            </div>
                            <input type="submit" name="submit" value="{{ __('message.dn')}}" class="btn btn-primary" id="login-btn">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
@endsection
