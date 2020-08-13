@extends('layouts.app')
    @section('content')
        <div id="signin">
            <div class="">
                @include('common.errors')
                <div class="login-panel panel panel-default">
                    <h1 id="signin-h1">{{ trans('message.in') }}</h1>
                    <div class="panel-body">
                        <form role="form" method="post">
                            {{csrf_field()}}
                            <fieldset>
                                <div class="form-group" id="signin-email">
                                    <input class="form-control" placeholder="{{ trans('message.email') }}" name="email" type="email" autofocus="" value="{{old('email')}}">
                                </div>
                                <div class="form-group" id="signin-password">
                                    <input class="form-control" placeholder="{{ trans('message.pass') }}" name="password" type="password" value="">
                                </div>
                                 <div class="form-group" id="signin-passwordcomfin">
                                    <input class="form-control" placeholder="{{ trans('message.passconfin') }}" name="passwordconfin" type="password" value="">
                                </div>
                                <input type="submit" name="submit" value="{{ __('message.dk')}}" class="btn btn-primary" id="signin-btn">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
    @endsection
