<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('auth.passwords.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = User::find($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak cocok.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('profile.index', $id)
        ->with('success', 'Password berhasil diperbarui!');
    }
}
