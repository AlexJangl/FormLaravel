<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
use App\Models\Status;
use App\Models\User;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $name = 'View Task';
        $tasks = Task::all();
        return view('adminViews.viewTasks', compact('tasks', 'name'));
    }

    public function delete ($id)
    {
        $name = 'Delete Task row ID = '.$id;
        $task = Task::find($id);
        return view('adminViews.deleteTask', compact('task', 'name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $name = 'Create Task';
        $statuses = Status::all();
        $users = User::all();
        return view('adminViews.createTask', compact('name', 'statuses', "users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(TaskRequest $request)
    {
        $task = new Task();
        $task->creator_id = $request->post('creator_id');
        $task->title = $request->post('title');
        $task->content = $request->post('content');
        $task->status_id = $request->post('status_id');
        $task->save();
        return redirect('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     */
    public function show($id)
    {
        return 'show TaskController'.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {
        $name = 'Edit Task ID = '.$id;
        $task = Task::find($id);
        $statuses = Status::all();
        $users = User::all();
        return view('adminViews.editTask', compact('task', 'name', 'statuses', "users"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);
        $task->creator_id = $request->post('creator_id');
        $task->title = $request->post('title');
        $task->content = $request->post('content');
        $task->status_id = $request->post('status_id');
        $task->save();
        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect('task');
    }
}
