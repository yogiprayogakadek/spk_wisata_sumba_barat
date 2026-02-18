<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService
    ) {}

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->userService->getDataTable(['id', 'nama', 'email', 'role']);
        }

        return view('main.user.index');
    }

    public function show($id)
    {
        $user = $this->userService->findById(['id', 'nama', 'email', 'role'], $id);
        return view('main.user.update', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        try {
            $data = $request->only(['nama', 'email', 'role']);
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $this->userService->update($id, $data);

            return redirect()->route('user.index')->with('success', 'User berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            if (auth()->id() == $id) {
                return response()->json(['success' => false, 'message' => 'Anda tidak dapat menghapus akun sendiri']);
            }

            $this->userService->delete($id);
            return response()->json(['success' => true, 'message' => 'User berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }

    public function showChangePassword()
    {
        return view('main.user.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password saat ini tidak cocok']);
        }

        try {
            $this->userService->update($user->id, [
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()->with('success', 'Password berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
