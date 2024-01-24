<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Adopter;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\MailSend;
use PDF;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function viewAdopter()
    {
        $adopter = Adopter::all();
        return view('admin.users.account.account', compact('adopter'));
    }

    public function register()
    {
        return view('landing-page.register');
    }

    // REGISTER AKUN USER
    public function createAdopterRegister(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:adopters',
            'email' => 'required|email|unique:adopters',
            'password' => 'required|min:6',
            'profile' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $str = Str::random(100);
        $filename = '';

        $profile = $request->file('profile');
        $filename = $profile->getClientOriginalName();
        $resizeImage = Image::make($profile->getRealPath())->orientate()->fit(200, 200);
        $resizeImage->save(public_path('storage/post-profile/' . $filename));
        if($request ->hasFile('profile')){
            $validatedData['profile'] = $request->image = 'storage/post-profile/' . $request->file('profile')->getClientOriginalName();
        }

        $adopter = Adopter::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile' => 'storage/post-profile/' . $filename,
            'verify_key' => $str,
            'level' =>  $request->level,
        ]);

        $details = [
            'username' => $request->username,
            'password' => $request->password,
            'profile' =>  $request->profile,
            'url' => $request->getHttpHost() . '/register/verify/' . $str
        ];

        Mail::to($request->email)->send(new MailSend($details));
        if ($adopter) {
            return redirect()
                ->route('login')
                ->with(['success' => 'Silahkan Cek Email Untuk Melakukan Verifikasi']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Verifikasi Akun Tidak Valid',
                ]);
        }
    }

    public function showConfirmationButton()
    {
        $verify_key = 'some_generated_verify_key';

        return view('landing-page.notifikasi', compact('verify_key'));
    }

    public function verify($id)
    {
        $keyCheck = Adopter::select('verify_key')
            ->where('verify_key', $id)
            ->exists();

        if ($keyCheck) {
            $adopter = Adopter::where('verify_key', $id)
                ->update([
                    'status' => 2
                ]);
                Session::flash('message', 'Akun anda sudah aktif');
                return redirect('/login');
        } else {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'message' => 'Verifikasi Tidak Valid',
            ]);
        }
    }

        // REGISTER AKUN ADMIN
        public function viewAdmin()
        {
            $admin = Admin::all();
            return view('admin.admin.admin', compact('admin'));
        }

        public function createAdmin()
        {
            $admin = Admin::all();
            return view('admin.admin.create-admin', compact('admin'));
        }
        public function storeAdmin(Request $request)
        {
            $this->validate($request, [
                'username' => 'required|unique:admins|min:5|max:50',
                'name' => 'required',
                'password' => 'required|string|min:5',
                'level' => 'required',
                'gender' => 'required',
            ]);


            $admin = Admin::create([
                'username' => $request->username,
                'name' => $request->name,
                'password' => bcrypt($request->password),
                'level' => $request->level,
                'gender' => $request->gender,
            ]);

            if ($admin) {
                return redirect()
                    ->route('admin.account')
                    ->with(['success' => 'Pendaftaran admin telah berhasil dilakukan']);
            } else {
                return back()
                    ->withInput()
                    ->with([
                        'error' => 'Terjadi kesalahan, silahkan coba kembali',
                    ]);
            }
        }

        public function editAdmin($id)
        {
            $admin = Admin::findOrFail($id);
            return view('admin.admin.edit-admin', compact('admin'));
        }

        public function updateAdmin(Request $request, $id)
        {
            $this->validate($request, [
                'username' => 'required',
                'name' => 'required',
                'level' => 'required',
                'gender' => 'required',
            ]);

            $admin = Admin::findOrFail($id);
            $admin->update([
                'username' => $request->username,
                'name' => $request->name,
                'level' => $request->level,
                'gender' => $request->gender,
            ]);

            if ($admin) {
                return redirect()
                    ->route('admin.account')
                    ->with(['success' => 'Data admin telah berhasil diperbarui']);
            } else {
                return back()
                    ->withInput()
                    ->with([
                        'error' => 'Terjadi kesalahan, silahkan coba kembali',
                    ]);
            }
        }


        //SOFTDELETE
        public function deleteAdmin(Request $request, $id)
        {
            $admin = Admin::findOrFail($id);
            $admin->delete();

            return redirect()->back()->with('success', 'Admin berhasil dihapus.');
        }

        public function trashAdmin()
        {
            $admin = Admin::onlyTrashed()->paginate(10);
            return view('admin.admin.trash-admin', ['admin' => $admin]);
        }

        public function restoreAdmin($id)
        {
            $admin = Admin::withTrashed()->findOrFail($id);
            if($admin->trashed()){

                $admin->restore();

                return redirect()->route('admin.trash')->with('status', 'Data berhasil diproses');

            } else {

                return redirect()->route('admin.trash')->with('status', 'Data tidak berhasil diproses');
            }

        }

        public function PDFAdmin()
        {
            $admin = Admin::all();
            return view('admin.admin.admin-pdf', compact('admin'));
        }
}
