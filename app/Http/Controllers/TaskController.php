<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use App\Task;
use App\Project;
use Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showTask(Request $request){
        $user_id = Auth::user()->id;
        $tasks = Task::where('user_id',$user_id)->orderBy('date')->get();
        $projects=Project::where('status',1)->orderBy('name')->lists('name','id');
        $default = 'Select Project';
        $turn_object_into_array = $projects->toArray();
        array_unshift($turn_object_into_array, $default);
		return view('tasks', [
            'projects' => $turn_object_into_array,
            'tasks' => $tasks
        ]);
    }

    public function storeTask(Request $request){
        $rules = array(
            'name'=>'required|max:255',
            'project_id'=>'required|not_in:0',
            'date'=>'required',
            'time'=>'required'
        );
        $messages = [
            'required'    => 'Please enter :attribute field.',
            'max'    => 'The :attribute may not be greater than :max characters.',
            'not_in' => 'Please select any Project.'
        ];
        $this->validate($request,$rules,$messages);
        $user_id = Auth::user()->id;
        $taskObj = new Task();
        $taskObj->name = $request->name;
        $taskObj->project_id = $request->project_id;
        $taskObj->date = date("Y-m-d", strtotime($request->date));
        $taskObj->time = $request->time;
        $taskObj->user_id = $user_id;
        $taskObj->save();
        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function deleteTask(Request $request, Task $task){
        $task->delete();
        return redirect('/tasks');
    }
}
