<?php

use App\Http\Controllers\TaskController;
use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->paginate(10);

    return view('index', [
        'tasks'=> $tasks,
    ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::PUT('tasks/{task}/toggle-complete', function(Task $task) {
    $task->completed = !$task->completed;
    $task->save();

    return redirect()->route('tasks.show', ['task'=> $task->id]);
})->name('tasks.toggle');
