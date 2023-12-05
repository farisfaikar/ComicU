<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10); // Menampilkan 10 pengguna per halaman

        return view('users.index-user', compact('users'));
    }

    public function create()
    {
        return view('users.create-user');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed', // 'confirmed' rule checks if the 'password_confirmation' field matches 'password'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Mengupdate data user
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Cek apakah password diisi
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman user list atau halaman lainnya
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('user.index')
            ->with('success', 'User deleted successfully.');
    }
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $users = User::where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                ->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('users.index-user', ['users' => $users]);
    }
}
