@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
        <a href="{{route('tasks.index')}}">Home</a>
    </button>
    <p class="mb-4">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4">{{ $task->long_description }}</p>
    @endif

    <p>Created: {{ $task->created_at->diffForHumans() }}</p>
    <p>Updated: {{ $task->updated_at->diffForHumans() }}</p>

    <div class="mt-4 mb-4">
        <span>Status: </span>
        @if($task->completed)
            <p class="text-green-800 inline-block">Completed</p>
        @else
            <p class="text-yellow-800 inline-block">Incomplete</p>
        @endif
    </div>

    <div class="flex gap-3">
        <a href="{{ route('tasks.edit', ['task' => $task])}}"
            class="bg-transparent hover:bg-gray-500 text-black-700 font-semibold hover:text-white py-2 px-4 border border-gray-500 hover:border-transparent rounded"
        >
            Edit
        </a>

        <form action="{{route('tasks.toggle', ['task' => $task])}}" method="POST">
            @csrf
            @method('PUT')
            @if (!$task->completed)
                <button type="submit" class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded">
                    Mark as Completed
                </button>
            @else
                <button type="submit" class="bg-transparent hover:bg-yellow-500 text-yellow-700 font-semibold hover:text-white py-2 px-4 border border-yellow-500 hover:border-transparent rounded">
                    Mark as Incomplete
                </button>
            @endif
        </form>

        <form method="POST" action="{{ route('tasks.destroy', [$task]) }}" >
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-2 px-4 border border-red-500 hover:border-transparent rounded">
                Delete
            </button>
        </form>
    </div>
@endsection
