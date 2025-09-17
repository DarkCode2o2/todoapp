@extends('layouts.app')
@section('title', 'Profile')

@section('content')


@include('inc.flashMessages')
<form class="max-w-md mt-5" action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" required name="fullName" minlength="4" autofocus value="{{$profile->fullName}}" id="floating_fullName" class="block py-2.5 px-0 w-full text-sm text-slate-900 bg-transparent border-0 border-b-2 border-slate-800 appearance-none :border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="floating_fullName" class="peer-focus:font-medium absolute text-sm text-slate-800  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full Name</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="username" required minlength="3" value="{{$profile->username}}" id="floating_username" class="block py-2.5 px-0 w-full text-sm text-slate-900 bg-transparent border-0 border-b-2 border-slate-800 appearance-none :border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="floating_username" class="peer-focus:font-medium absolute text-sm text-slate-800  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="password" minlength="6" name="password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-slate-900 bg-transparent border-0 border-b-2 border-slate-800 appearance-none :border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="floating_password" class="peer-focus:font-medium absolute text-sm text-slate-800  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <label class="block mb-2 text-sm font-medium text-slate-800" for="user_avatar">Avatar Image</label>
        <input type="file" name="avatar" id="file" class="block w-full text-sm text-slate-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" aria-describedby="user_avatar_help" id="user_avatar">
        <div class="mt-1 text-sm text-gray-500" id="user_avatar_help">A profile picture is useful to confirm you are logged into your account</div>
        <img class="w-20 h-20 mt-2 rounded" id="img" src="{{$profile->avatar != null ? asset("storage/$profile->avatar") : asset("storage/avatars/noImage.jpg")}}" alt="Rounded avatar">
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
    <button type="submit" class="text-white cursor-pointer bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
</form>

@endsection