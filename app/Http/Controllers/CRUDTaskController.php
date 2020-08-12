<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Auth;
use App\Http\Requests\CrudTask\TaskRequest;

class CRUDTaskController extends Controller
{
    public function getTask(){
        $count['task'] = Task::count('task_id');
        if($count >= 8){
            $data['tasks'] = Task::where('task_id_user', Auth::user()->id)->paginate(8)->onEachSide(2);;

            return view('crudtask.tasks', $data);
        }
        else{
            $data['tasks'] = Task::where('task_id_user', Auth::user()->id)->get();

            return view('crudtask.tasks', $data);
        }
    }
    public function postTask(TaskRequest $request){
        $task = new Task;
        $task->name = $request->name;
        $task->task_id_user = Auth::user()->id;
        $task->save();

        return back();
    }

    public function getEditTask($id){
        if($id != null){
            $data['tasks'] = Task::find($id);

            return view('crudtask.edittask', $data);
        }
        else
        {
            return back()->withErrors( __('message.edit'));
        }
    }

    public function postEditTask(TaskRequest $request,$id){
        if($id != null){
            $task = Task::find($id);
            $task->name = $request->name;
            $task->task_id_user = Auth::user()->id;
            $task->save();
            return redirect()->intended('CRUD/task');
        }
        else
        {
            return back()->withErrors( __('message.edit'));
        }


    }

    public function getDelTask($id){
        if($id != null){
            Task::destroy($id);
            return back();
        }
        else
        {
            return back()->withErrors( __('message.xoa'));
        }

    }
}
