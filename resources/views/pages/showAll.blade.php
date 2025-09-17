@extends('layouts.app')
@section('title', 'All Tasks')
@section('content')

<div class="tasks">
    <div class="flex justify-between items-center md:items-start mt-2 mb-14 gap-2">
        <h3 class="text-2xl md:text-4xl">Welcome back, <span class="text-blue-400">{{auth()->user()->fullName}}</span></h3>
        <a href="/tasks/create" class="py-1 px-2 text-white text-sm w-[90px] lg:w-auto lg:text-lg text-center bg-blue-500 rounded shadow-md shadow-gray-400 hover:bg-blue-700 transition-all  hover:shadow-md hover:shadow-blue-500">Add task</a>
    </div>
    @include('inc.flashMessages')
    <div class="latest">
        <div class="flex justify-between items-center mb-4">
            <p class="font-semibold text-blue-500">
                <svg class="w-6 h-6 inline-block text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z"/>
                </svg>
                All Todo Tasks
            </p>
            <form method="GET" action="{{ route('showAll') }}">
                <label>
                    Show All
                    <input type="checkbox" name="show_all" value="true" class="rounded w-5 h-5"
                        onchange="this.form.submit()"
                        {{ request()->has('show_all') ? 'checked' : '' }}>
                </label>
            </form>
        </div>
        @if (count($tasks) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                @foreach ($tasks as $task)
                    <a href="/tasks/{{$task->id}}" class="task relative w-full border-1 border-gray-300 rounded p-2 mb-4 pl-7 hover:border-gray-500 hover:bg-blue-100 transition-all">
                        @if($task->is_done)
                            <svg class="absolute left-0.5 top-1 w-6 h-6 text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        @else 
                            <svg class="absolute left-0.5 top-1 w-6 h-6 text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        @endif

                        <h3 class="font-semibold mb-2 text-2xl">{{$task->title}}</h3>
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
                    </a>
                @endforeach
            </div>
        @else
            <div class="p-4 mb-4 flex items-center text-sm text-blue-400 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                <svg class="shrink-0 inline w-5 h-5 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="text-xl">
                    No Tasks To Show
                </div>
            </div>
        @endif
    </div>
</div>

@endsection