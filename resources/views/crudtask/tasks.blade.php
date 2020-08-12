<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{asset('CRUD/task')}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">{{ trans('message.task')}}</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>  {{ trans('message.add')}}
                    </button>
                </div>
            </div>
        </form>
    </div>

       <h1>{{ __('message.sum')}} {{count($tasks)}}</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{{ trans('message.nv')}}</h5>
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>{{ trans('message.task')}}</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                            <?php foreach ($tasks as $task): ?>
                                <tr>
                                    <!-- Task Name -->
                                    <td class="table-text" style="width: 60%;">
                                        <div>{{$task->name}}</div>
                                    </td>
                                    <td style="width: 40%;">
                                       <a href="{{asset('CRUD/deltask/'.$task->task_id)}}"><input type="submit" name="" class="btn btn-danger" value="Delete"></a>
                                       <a href="{{asset('CRUD/edittask/'.$task->task_id)}}"><input type="submit" name="" class="btn btn-danger" value="Edit"></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
                @if($tasks->hasPages())
                    {{ $tasks->links() }}
                @endif
            </div>
        </div>

    <!-- TODO: Current Tasks -->
@endsection
