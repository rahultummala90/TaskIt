<?php

use App\Http\Controllers\TaskController;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    $tasks = Task::latest()->get();

    return view('index', [
        'tasks'=> $tasks,
    ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');
// Route::post('tasks', function (Request $request) {
//     dd($request->all());
// })->name('tasks.store');

Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');


Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);

    return view('show', ['task' => $task]);
})->name('tasks.show');


Route::get('/tasks/{id}/edit', function ($id) {
    $task = Task::findOrFail($id);

    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::put('tasks/{id}', [TaskController::class, 'edit'])->name('tasks.update');
