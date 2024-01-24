<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Adopter;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;


class LoginController extends Controller
{
    public function login()
    {
        return view('landing-page.login');
    }

    public function actionLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only('username', 'password'))) {
            return redirect('/dashboard/admin');
        } else if (Auth::guard('adopter')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => '2'], $request->filled('remember'))) {
            return redirect('/dashboard/adopter');
        } else if (Auth::guard('adopter')->attempt(['username' => $request->username, 'password' => $request->password, 'status' => '1'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Akun Anda belum diverifikasi. Silakan cek email Anda untuk melakukan verifikasi terlebih dahulu.',
                ]);
        }

        return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Password atau Username Anda salah, silahkan coba kembali',
            ]);
    }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('adopter')->check()) {
            Auth::guard('adopter')->logout();
        }
        return redirect('/login');
    }
}
