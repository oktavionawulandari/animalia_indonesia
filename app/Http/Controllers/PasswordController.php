<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Adopter;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{

    //EDIT PASSWORD ADMIN
    public function editPasswordAdmin()
    {
        return view('admin.admin.profile.edit-password');
    }

    public function updatePasswordAdmin(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|string',
            'newpassword' => 'required|string',
        ]);
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::findOrFail($id);
        if (Hash::check($request->input('oldpassword'), $admin->password)) {
            $admin->update([
                'password' => bcrypt($request->newpassword)
            ]);
            if ($admin) {
                return back()
                    ->with(['success' => 'Password anda telah berhasil diperbarui']);
            } else {
                return back()
                    ->withInput()
                    ->with([
                        'error' => 'Terjadi kesalahan, silahkan coba kembali'
                    ]);
            }
        }
        return back()
            ->withInput()
            ->with([
                'error' => 'Password lama yang Anda masukkan salah, silahkan coba kembali'
            ]);
    }

    //EDIT PASSWORD ADOPTER
    public function editPassword()
    {
        return view('adopter.profile.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldpassword' => 'required|string|min:8|max:30',
            'newpassword' => 'required|string|min:8|max:30',
        ]);
        $id = Auth::guard('adopter')->user()->id;
        $adopter = Adopter::findOrFail($id);
        if (Hash::check($request->input('oldpassword'), $adopter->password)) {
            $adopter->update([
                'password' => bcrypt($request->newpassword)
            ]);
            if ($adopter) {
                return back()
                    ->with(['success' => 'Password anda telah berhasil diperbarui']);
            } else {
                return back()
                    ->withInput()
                    ->with([
                        'error' => 'Terjadi kesalahan, silahkan coba kembali'
                    ]);
            }
        }
        return back()
            ->withInput()
            ->with([
                'error' => 'Password lama yang anda masukkan salah, silahkan coba kembali'
            ]);
    }
}
