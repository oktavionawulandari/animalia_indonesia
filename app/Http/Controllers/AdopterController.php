<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailAdopter;
use App\Models\Regency;
use App\Models\Adopter;
use App\Models\SubDistrict;
use App\Models\Adoption;
use App\Models\Form;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdopterController extends Controller
{
    public function addAdopter()
    {
        $detail_adopters = DetailAdopter::all();
        $regencies = Regency::all();
        $sub_districts = SubDistrict::all();

        return view('adopter.add-data', compact('detail_adopters', 'regencies', 'sub_districts'));
    }

    public function storeAdopter(Request $request)
    {

        $this->validate($request, [
            'regency_id' => 'required|exists:regencies,id',
            'sub_district_id' => 'required|exists:sub_districts,id',
            'nik' => 'required',
            'ktp_picture' => 'required|image',
            'full_name' => 'required',
            'phone' => 'required',
            'picture_home' => 'required|image',
            'birthday' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'gender' => 'required',
            'maps' => 'required',
        ]);

        $ktp_picture = $request->file('ktp_picture');
        $filename = $ktp_picture->getClientOriginalName();
        $resizeImage = Image::make($ktp_picture->getRealPath());
        $resizeImage->save(public_path('storage/post-ktp/' . $filename));
        if ($request->hasFile('ktp_picture')) {
            $validatedData['ktp_picture'] = $request->ktp_picture = 'storage/post-ktp/' . $request->file('ktp_picture')->getClientOriginalName();
        }

        $picture_home = $request->file('picture_home');
        $filename = $picture_home->getClientOriginalName();
        $resizeImage = Image::make($picture_home->getRealPath());
        $resizeImage->save(public_path('storage/post-home/' . $filename));
        if ($request->hasFile('picture_home')) {
            $validatedData['picture_home'] = $request->picture_home = 'storage/post-home/' . $request->file('picture_home')->getClientOriginalName();
        }

        $adopterId = auth()->id();

        $detail_adopters = DetailAdopter::create([
            'nik' => $request->nik,
            'ktp_picture' => $request->ktp_picture,
            'full_name' => $request->full_name,
            'zip_code' => $request->zip_code,
            'street' => $request->street,
            'regency_id' => $request->regency_id,
            'sub_district_id' => $request->sub_district_id,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'picture_home' => $request->picture_home,
            'gender' => $request->gender,
            'maps' => $request->maps,
            'adopter_id' => $adopterId,
        ]);

        if ($detail_adopters) {
            return redirect()
                ->route('dashboard.adopter')
                ->with(['success' => 'Data diri telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function getSubDistricts(Request $request)
    {
        $regencyId = $request->input('regency_id');
        $subDistricts = SubDistrict::where('regency_id', $regencyId)->get();

        return response()->json($subDistricts);
    }

    public function index()
    {
        $adoptions = Adoption::whereIn('status', ['Free', 'Failed'])->get();
        $animals = Animal::whereIn('id', $adoptions->pluck('animal_id'))->get();
        return view('adopter.list-adoption', compact('adoptions', 'animals'));
    }

    public function editData($id)
    {
        $adoption = Adoption::findOrFail($id);
        $detailAdopter = DetailAdopter::where('id', $adoption->adopter_id)->first();
        $form = Form::where('id', $adoption->adopter_id)->first();
        $regencies = Regency::all();
        $subDistricts = SubDistrict::all();

        return view('adopter.edit-syarat', compact('adoption', 'detailAdopter', 'regencies', 'subDistricts', 'form'));
    }


    public function updateData(Request $request, $id)
    {
        $adoption = Adoption::findOrFail($id);
        $detailAdopter = $adoption->detailAdopter;
        $animal = $adoption->animal;
        $form = $adoption->form;
        $oldKtpPicture = $detailAdopter->ktp_picture;
        $oldPictureHome = $detailAdopter->picture_home;
        $oldDocumentPath = $form->document;


        $this->validate($request, [
            'regency_id' => 'required|exists:regencies,id',
            'sub_district_id' => 'required|exists:sub_districts,id',
            'nik' => 'required',
            'ktp_picture' => 'image',
            'full_name' => 'required',
            'phone' => 'required',
            'picture_home' => 'image',
            'birthday' => 'required',
            'zip_code' => 'required',
            'street' => 'required',
            'gender' => 'required',
            'maps' => 'required',
            'document' => 'nullable|mimes:pdf,docx,doc',
            'status' => 'required',
            'adoption' => 'required',
            'message' => 'required',
        ]);


        if ($request->hasFile('ktp_picture')) {
            if ($oldKtpPicture) {
                Storage::delete($oldKtpPicture);
            }

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

        $detailAdopter->nik = $request->input('nik');
        $detailAdopter->full_name = $request->input('full_name');
        $detailAdopter->phone = $request->input('phone');
        $detailAdopter->birthday = $request->input('birthday');
        $detailAdopter->zip_code = $request->input('zip_code');
        $detailAdopter->street = $request->input('street');
        $detailAdopter->gender = $request->input('gender');
        $detailAdopter->maps = $request->input('maps');
        $detailAdopter->regency_id = $request->input('regency_id');
        $detailAdopter->sub_district_id = $request->input('sub_district_id');
        $detailAdopter->save();

        $adoption->adoption = $request->input('adoption');
        $adoption->message = $request->input('message');
        $adoption->save();

        $animal->status = $request->input('status');
        $animal->save();

        $oldDocumentPath = $request->input('old_document');

        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $extension = $document->getClientOriginalExtension();
            $id = uniqid();
            $filename = $id . '.' . $extension;
            $path = Storage::disk('public')->putFileAs('post-document', $document, $filename);

            if ($oldDocumentPath) {
                Storage::disk('public')->delete($oldDocumentPath);
            }
        } else {
            $path = $oldDocumentPath;
        }

        return redirect()
            ->route('adopter.data.status')
            ->with('success', 'Data rescue telah berhasil diperbarui');
    }



    public function editAdopter(Request $request)
    {
        $regencyId = $request->input('regency_id');
        $subDistricts = SubDistrict::where('regency_id', $regencyId)->get();

        return response()->json(['sub_districts' => $subDistricts]);
    }
}
