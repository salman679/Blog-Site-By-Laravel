<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Util\Regex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();

        return view('back.users.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.users.create_users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|max:256|email', //regex:/[\wa-zA-Z\d0-1](@gmail.com)/i
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'image' => 'image|mimes:png,jpg,jpeg|max:2024'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->image = image_template(USER_AVATAR, $request->image, null, 300, 300, 0);

        // $users->thumbnail = image_template(USER_AVATAR_THUMBNAIL, $request->image, null, 300, 121, 25);

        $user->save();

        return redirect()->route('users.index')->with('success', 'User Information has been successfully added.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::where('id', $id)->firstOrFail();

        return view('back.users.edit_users', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => ["required", "max:256"],
            "password" => ['required', 'min:8'],
            "confirm_password" => ['required', 'same:password'],
            "image" => ["nullable", "max:256", 'mimes:jpg,png'],
        ]);

        $users = User::where('id', $id)->firstOrFail();

        $users->name = $request->name;
        $users->password = Hash::make($request->password);

        if ($request->image) {
            $users->image = image_template(USER_AVATAR, $request->image, $users->image, 44, 44, 0);
        }

        $users->save();

        if (Auth::user()->id === $users->id) {
            Auth::logout();
        }

        return redirect()->route('users.index')->with('success', 'Your Information Has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::where('id', $id)->firstOrFail();
        if ($users->image) {
            unlink(public_path($users->image));
        }

        $users->delete();

        return redirect()->route('users.index')->with('success', 'Your Profile Has been deleted.');
    }
}
