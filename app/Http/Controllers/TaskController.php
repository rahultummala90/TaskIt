<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $validated_data = $request->validate([
            "title" => "required|max:255",
            "description" => "required",
            "long_description" => "required"
        ]);

        $task = new Task($validated_data);
        $task->save();

        return redirect()->route("tasks.show", [
                "id" => $task->id
            ])->with("success","Task created successfully");

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
    public function edit($id, Request $request)
    {
        $validated_data = $request->validate([
            "title" => "required|max:255",
            "description" => "required",
            "long_description" => "required"
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            "title"=> $validated_data["title"],
            "description"=> $validated_data["description"],
            "long_description"=> $validated_data["long_description"],
        ]);
        $task->save();

        return redirect()->route("tasks.show", [
                "id" => $task->id
            ])->with("success","Task edited successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
