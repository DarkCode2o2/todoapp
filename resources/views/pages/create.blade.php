@extends('layouts.app')
@section('title', 'Create Task')

@section('content')

<p class="font-semibold text-2xl text-blue-500 mb-10">
    <svg class="w-6 h-6 inline-block text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z"/>
    </svg>
    Add a Task
</p>
<form method="POST" action="{{route('tasks.store')}}" class="max-w-md">
    @csrf
    @include('inc.flashMessages')
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="title" minlength="4" id="floating_title" class="block py-2.5 px-0 w-full text-sm text-slate-900 bg-transparent border-0 border-b-2 border-slate-500 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_title" class="peer-focus:font-medium absolute text-sm text-slate-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <label for="message" class="block mb-2 text-sm font-medium text-slate-500">Content</label>
        <textarea id="message" name="body" rows="4" required class="block p-2.5 w-full text-sm text-slate-900 bg-slate-50 rounded-lg border border-slate-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
    </div>
     @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
            <ul>
            @foreach ($errors->all() as $error)
                <li><span class="font-medium">Error:</span> {{$error}}</li>
            @endforeach
            </ul>
        </div>
    @endif
    <input type="submit" value="Add" class="text-white bg-blue-500 hover:bg-blue-800 transition-all focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full cursor-pointer sm:w-auto px-5 py-2.5 text-center">
</form>

@endsection