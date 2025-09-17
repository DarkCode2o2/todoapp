@extends('layouts.app')
@section('title', 'All Tasks')
@section('content')

<div class="task">
    @if (!empty($task))
    
    <div class="task relative mt-2 w-full max-w-full md:w-10/11 bg-gray-200 p-4 rounded shadow-xs mx-auto transition-all">
            <div class="flex justify-between items-start md:items-center flex-col md:flex-row">
                <h3 class="font-semibold mb-2 text-3xl">{{$task->title}}</h3>
                <div class="flex items-center gap-2 mb-4 md:mb-0">
                    @if ($task->is_done)
                        <form action="{{route('tasks.done', $task->id)}}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="cursor-pointer text-sm rounded shadow-2xl py-1 px-2  bg-green-400 hover:bg-green-500 transition-all">
                                Undone
                            </button>
                        </form>
                    @else
                    <form action="{{route('tasks.done', $task->id)}}" method="POST" class="inline-block">
                        @csrf
                        <button type="submit" class="cursor-pointer text-sm rounded shadow-2xl py-1 px-2  bg-red-400 hover:bg-red-500 transition-all">
                            Done
                        </button>
                    </form>
                    @endif

                    <a href="{{route('tasks.edit', $task->id)}}" class="py-1 px-2 text-sm rounded shadow-2xl bg-blue-400 hover:bg-blue-700 transition-all">Edit</a>
                    <form action="{{route('tasks.destroy', $task->id)}}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cursor-pointer py-1 px-2 text-sm rounded shadow-2xl bg-red-500 hover:bg-red-700 transition-all">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-gray-500">
                {{$task->body}}
            </p>
            <div>
                <small class="mr-4 text-gray-700">Status:
                    @if($task->is_done)
                        <span class="text-red-400 font-semibold">
                            Done
                        </span>
                    @else 
                        <span class="text-blue-400 font-semibold">
                            In progress
                        </span>
                    @endif
                    </small>
                <small class="mr-4 text-gray-700">Created at: <span class="font-semibold">2020/10/22</span></small>
            </div>
        </div>
    @else
        <div class="p-4 mb-4 flex items-center text-sm text-blue-400 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
            <svg class="shrink-0 inline w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="text-xl">
                No Task To Show
            </div>
        </div>
    @endif
</div>

@endsection