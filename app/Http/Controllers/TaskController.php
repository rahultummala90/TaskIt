<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());

        return redirect()->route("tasks.show", [
                "task" => $task->id
            ])->with("success","Task has been created successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Task $task, TaskRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task, TaskRequest $request)
    {
        $task->update($request->validated());

        return redirect()->route("tasks.show", [
                "task" => $task->id
            ])->with("success","Task updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route("tasks.index")
            ->with("success","Task deleted successfully");
    }
}
