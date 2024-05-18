<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'title' => 'Tổng quan'
        ]);
    }

    public function updateInfoAdmin($id)
    {
        $user = User::find($id);
        return view("admin.updateAdmin", [
            'title' => 'Chỉnh sửa thông tin'
        ], ['user' => $user]);
    }

    public function handleUpdateAdmin(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user){
            return redirect()->back()->with('error', 'Người dùng không tồn tại.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        $user->update($validatedData);

        return redirect()->route('main')->with('success', 'Thông tin đã được cập nhật thành công.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin/users/login'); // Redirect to login page after logout
    }
}
