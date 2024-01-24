<?php

namespace App\Http\Controllers;
use App\Models\DetailAdopter;
use App\Models\Regency;
use App\Models\Adopter;
use App\Models\Admin;
use App\Models\SubDistrict;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    // PROFILE ADMIN
    public function profileAdmin()
    {
        $admin = Admin::find(auth()->id());
        return view('admin.admin.profile.profile', compact('admin'));
    }

    public function updateFotoProfileAdmin(Request $request, $id)
    {
        $request->validate([
            'profile' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $admin = Admin::findOrFail($id);

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $filename = time() . '.' . $profile->getClientOriginalExtension();

            // Delete old profile picture if exists
            if ($admin->profile && File::exists(public_path($admin->profile))) {
                File::delete(public_path($admin->profile));
            }

            // Resize and save the new profile picture
            $resizeImage = Image::make($profile->getRealPath())->orientate()->fit(300, 300);
            $resizeImage->save(public_path('storage/post-admin/' . $filename));
            $admin->profile = 'storage/post-admin/' . $filename;
        }

        if ($admin->save()) {
            return redirect()
                ->route('admin.data.profile')
                ->with('success', 'Foto profil telah berhasil diperbarui!');
        } else {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan, silahkan coba kembali');
        }
    }

    public function editProfileAdmin($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admin.profile.edit-profile', compact('admin'));
    }

    public function updateProfileAdmin(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
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

        $admin->username = $request->username;
        $admin->name = $request->name;
        $admin->level = $request->level;
        $admin->gender = $request->gender;
        $admin->save();


        if ($admin) {
            return redirect()
                ->route('admin.data.profile')
                ->with(['success' => 'Data admin telah berhasil diperbarui']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }


    // PROFILE ADOPTER
    public function profile()
        {
            $adopter = Adopter::with('detailAdopter.regency', 'detailAdopter.subDistrict', 'form')->find(auth()->id());
            return view('adopter.profile.profile', compact('adopter'));
        }

    public function updateProfilePicture(Request $request, $id)
    {
        $request->validate([
            'profile' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $adopter = Adopter::findOrFail($id);

        if ($request->hasFile('profile')) {
            $profile = $request->file('profile');
            $filename = time() . '.' . $profile->getClientOriginalExtension();

            if ($adopter->profile && File::exists(public_path($adopter->profile))) {
                File::delete(public_path($adopter->profile));
            }

            $resizeImage = Image::make($profile->getRealPath())->orientate()->fit(300, 300);
            $resizeImage->save(public_path('storage/post-profile/' . $filename));
            $adopter->profile = 'storage/post-profile/' . $filename;
        }

        if ($adopter->save()) {
            return redirect()
                ->route('adopter.data.profile')
                ->with('success', 'Foto profile telah berhasil diperbarui');
        } else {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan, silahkan coba kembali');
        }
    }


    public function editProfile($id)
    {
        $adopter = Adopter::findOrFail($id);
        return view('adopter.profile.edit-profile', compact('adopter'));
    }


    public function editAdopter($id)
    {
        $adopter = Adopter::findOrFail($id);
        $detailAdopter = DetailAdopter::where('adopter_id', $id)->first();
        $regencies = Regency::all();
        $sub_districts = SubDistrict::all();
        $oldRegencyId = old('regency_id', $detailAdopter->regency_id);
        $oldSubDistrictId = old('sub_district_id', $detailAdopter->sub_district_id);

        return view('adopter.profile.edit-adopter', compact('adopter', 'detailAdopter', 'regencies', 'oldRegencyId', 'oldSubDistrictId','sub_districts'));
    }

    public function updateAdopter(Request $request, $id)
    {
        $adopter = Adopter::findOrFail($id);
        $detailAdopter = DetailAdopter::where('adopter_id', $adopter->id)->first();
        $oldKtpPicture = $detailAdopter->ktp_picture;
        $oldPictureHome = $detailAdopter->picture_home;

        $validator = Validator::make($request->all(), [
            'ktp_picture' => 'image|mimes:jpeg,png,jpg,gif',
            'picture_home' => 'image|mimes:jpeg,png,jpg,gif',
            'username' => 'required',
            'full_name' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
            'regency_id' => 'required',
            'sub_district_id' => 'required',
            'street' => 'required',
        ]);

        if ($request->hasFile('ktp_picture')) {
            // Hapus gambar lama jika ada
            if ($oldKtpPicture) {
                Storage::delete($oldKtpPicture);
            }

            // Simpan gambar baru
            $ktp_picture = $request->file('ktp_picture');
            $filename = $ktp_picture->getClientOriginalName();
            $ktp_picture->move(public_path('storage/post-ktp'), $filename);
            $detailAdopter->ktp_picture = 'storage/post-ktp/' . $filename;
        }

        if ($request->hasFile('picture_home')) {
            if ($oldPictureHome) {
                Storage::delete($oldPictureHome);
            }

            $picture_home = $request->file('picture_home');
            $filename = $picture_home->getClientOriginalName();
            $picture_home->move(public_path('storage/post-home'), $filename);
            $detailAdopter->picture_home = 'storage/post-home/' . $filename;
        }

        $adopter->username = $request->username;
        $adopter->email = $request->email;
        $adopter->save();

        $detailAdopter->full_name = $request->full_name;
        $detailAdopter->nik = $request->nik;
        $detailAdopter->phone = $request->phone;
        $detailAdopter->birthday = $request->birthday;
        $detailAdopter->gender = $request->gender;
        $detailAdopter->street = $request->street;
        $detailAdopter->regency_id = $request->regency_id;
        $detailAdopter->sub_district_id = $request->sub_district_id;
        $detailAdopter->save();

        return redirect()->route('adopter.data.profile', $adopter->id)->with('success', 'Profil telah berhasil diperbarui');
    }

    public function editSubDistrict(Request $request)
    {
        $regencyId = $request->input('regency_id');
        $subDistricts = SubDistrict::where('regency_id', $regencyId)->get();

        return response()->json(['sub_districts' => $subDistricts]);
    }
}
