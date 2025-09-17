<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        $profile = User::findorfail(auth()->user()->id);
        return view('profile', compact('profile'));
    }

    public function update(Request $request) {
        $request->validate([
            'fullName' => ['required', 'min:4'], 
            'username' => ['required','min:3',
                 Rule::unique('users', 'username')->ignore(auth()->user()->id)],
            'password' => ['nullable', 'min:6']
        ]);

        $user = User::find(auth()->user()->id);

        if($request->hasFile('avatar')) {

            $request->validate([
                'avatar' => ['image', 'max:4048']
            ]);

            if($request->user()->avatar) {
                Storage::disk('public')->delete($request->user()->avatar);
            }
            
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->fullName = $request->input('fullName');
        $user->username = $request->input('username');
        $user->password = $request->input('password') ? Hash::make($request->input('password')) : auth()->user()->password;
        $user->save();

        return back()->with('success', 'Profile is updated successfully!');
    }
}
