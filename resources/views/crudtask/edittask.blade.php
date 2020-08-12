<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->
    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')
        <div class="panel panel-default" id="edit" class="form-group">
         <form method="post" action="">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" name="name" value="{{$tasks->name}}">
            </div>
                <input type="submit" name="submit" class=" btn btn-primary" value="{{ __('message.sua')}}">
         </form>
        </div>
 </div>
    <!-- TODO: Current Tasks -->
@endsection
