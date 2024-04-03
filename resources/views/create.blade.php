@extends('layouts.app')

@section('title', 'Create a task')
@section('styles')
    <style type="text/tailwindcss">
        .error-message {
            color: red;
        }

        input {
            @apply bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                dark:focus:border-blue-500
        }

        textarea {
            @apply block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300
            focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
            dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
        }

    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div>
            <label for="title"
                class="block mb-2 text-l font-medium text-gray-900 dark:text-white"
            >
                Title
            </label>
            <input text="text" name="title" id="title" value="{{old('title')}}" class="mb-4"/>
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block mb-2 text-l font-medium text-gray-900 dark:text-white">Description</label>
            <textarea text="textarea" name="description" id="description" rows="5" class="mb-4">
                {{old('description')}}
            </textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description" class="block mb-2 text-l font-medium text-gray-900 dark:text-white">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">
                {{old('long_description')}}
            </textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Add Task</button>
        <button class="mx-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded "><a href="{{ route('tasks.index') }}">Cancel</a></button>
    </form>
@endsection
