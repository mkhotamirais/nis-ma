<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function users()
    {
        Gate::allowIf(fn(User $user) => $user->role === 'admin');

        $users = User::orderByRaw("FIELD(role, 'admin', 'editor', 'user')")
            ->paginate(10);
        return view('admin.auth.users', compact('users'));
    }

    public function deleteUser(Request $request)
    {
        Gate::allowIf(fn(User $user) => $user->role === 'admin');

        $user = User::findOrFail($request->user_id);

        if ($user->email === "mkhotamirais@gmail.com") {
            return redirect('/users')->with('error', "Admin utama tidak dapat di-hapus");
        } else {
            $user->delete();
            return redirect('/users')->with('success', "User berhasil di-hapus");
        }
    }


    public function changeRole(Request $request)
    {
        Gate::allowIf(fn(User $user) => $user->role === 'admin');

        // Validate
        $fields = $request->validate([
            'user' => 'required|exists:users,id',
            'role' => 'required|in:user,editor,admin',
        ]);

        $user = User::findOrFail($fields['user']);

        $user->email === "mkhotamirais@gmail.com"
            ? $user->role = "admin"
            : $user->role = $fields['role'];

        $user->save();

        return redirect('/users')->with('success', "$user->name role berhasil di-update");
    }

    public function updateMe(Request $request)
    {
        Gate::allowIf(fn(User $user) => $user->id == $request->user_id);

        // Validate
        $fields = $request->validate([
            'name' => 'required|max:255',
            'email' => "required|email|max:255|unique:users,email,$request->user_id",
        ]);

        // Update
        $user = User::findOrFail(auth()->user()->id);
        $user->update($fields);

        return back()->with('success', "Profile berhasil di-update");
    }
}
