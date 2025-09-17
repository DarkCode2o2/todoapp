@extends('layouts.auth')
@section('title', 'Register')

@section('content')
    <h3 class="text-white text-4xl my-4 text-center">Register page</h3>
    @include('inc.flashMessages')
    <form method="POST" action="{{route('registerStore')}}" class="max-w-sm mx-auto bg-slate-800 p-4 mt-10 rounded shadow-2xl shadow-sky-900/50">
        @csrf
        <div class="mb-5">
            <label for="fullName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Full-Name</label>
            <input type="text" id="fullName" name="fullName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Jhon Doe" required />
        </div>

        <div class="mb-5">
            <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
            <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="JhonDoe" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="***********" />
        </div>
        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <ul>
                @foreach ($errors->all() as $error)
                    <li><span class="font-medium">Error:</span> {{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif
        <p class="text-white mb-2">Already have an account? <a href="/login" class="text-sky-500 hover:underline">Login</a></p>
        <input type="submit" value="Register" class="cursor-pointer text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"/>
    </form>
@endsection
