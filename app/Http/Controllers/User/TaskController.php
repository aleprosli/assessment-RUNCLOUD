<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Workspace $workspace)
    {
        //Validation
        $request->validate([
            'name' => 'required|min:5',
            'due_date' => 'required',
            'due_date' => 'required',
        ]);

        //Store using mass asign
        Task::create([
            'workspace_id' => $workspace->id,
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'deadline' => $request->due_date." ".$request->due_time,
        ]);

        return back()->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Task Created!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('updateTask', $task);

        $task->update([
            'task_complete' => Carbon::now(),
            'status' => 'true',
        ]);

        return back()->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Task updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $this->authorize('deleteTask', $task);

        $task->delete();

        return back()->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'Task deleted!'
        ]);
    }
}
