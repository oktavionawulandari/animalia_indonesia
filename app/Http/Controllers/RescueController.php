<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rescue;
use App\Models\DetailRescue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Exports\RescueExport;
use Maatwebsite\Excel\Facades\Excel;

class RescueController extends Controller
{

    public function listCatRescue()
    {
        $rescues = Rescue::with('detailRescue')->whereIn('category', ['Cats'])->get();
        return view('admin.animals.rescue.cats-rescue', compact('rescues'));
    }


    public function listDogRescue()
    {
        $rescues = Rescue::with('detailRescue')->whereIn('category', ['Dogs'])->get();
        return view('admin.animals.rescue.dogs-rescue', compact('rescues'));
    }

    public function listRescue()
    {
        $rescues = Rescue::all();
        $details = DetailRescue::all();
        return view('admin.animals.rescue.rescue', compact('rescues', 'details'));
    }

    public function createRescue()
    {
        return view('admin.animals.rescue.create-rescue');
    }

    public function storeRescue(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'name_pets' => 'required|string',
            'age' => 'required|string',
            'date' => 'required',
            'gender' => 'required|in:Male,Female',
            'category' => 'required|in:Dogs,Cats',
            'location' => 'required|string',
            'information' => 'required|string',
            'status' => 'required|in:found,lost',
            'name_contact' => 'required|string',
            'phone' => 'required|string',
        ]);

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $resizeImage = Image::make($image->getRealPath())->orientate()->fit(200, 200);
        $resizeImage->save(public_path('storage/post-rescue/' . $filename));
        if($request ->hasFile('image')){
            $validatedData['image'] = $request->image = 'storage/post-rescue/' . $request->file('image')->getClientOriginalName();
        }

        $adminId = auth()->id();

        $rescue = Rescue::create([
            'image' => $validatedData['image'],
            'name_pets' => $validatedData['name_pets'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'category' => $validatedData['category'],
            'date' => $validatedData['date'],
            'location' => $validatedData['location'],
            'information' => $validatedData['information'],
            'status' => $validatedData['status'],
        ]);

        $detailRescue = new DetailRescue();
        $detailRescue->name_contact = $validatedData['name_contact'];
        $detailRescue->phone = $validatedData['phone'];
        $detailRescue->admin_id = $adminId;

        $rescue->detailRescue()->save($detailRescue);

        if ($rescue) {
            return redirect()
                ->route('rescue.list')
                ->with(['success' => 'Data rescue berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function editRescue($id)
    {
        $rescue = Rescue::findOrFail($id);
        $details = $rescue->detailRescue;
        return view('admin.animals.rescue.edit-rescue', compact('rescue', 'details'));
    }

    public function updateRescue(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|file|max:6024',
            'name_pets' => 'required|string',
            'age' => 'required|string',
            'gender' => 'required|in:Male,Female',
            'category' => 'required|in:Dogs,Cats',
            'date' => 'required',
            'location' => 'required|string',
            'information' => 'required|string',
            'status' => 'required|in:found,lost',
            'name_contact' => 'required|string',
            'phone' => 'required|string',
        ]);

        $rescue = Rescue::findOrFail($id);
        $detailRescue = $rescue->detailRescue;
        $oldImage = $rescue->image;

        $adminId = auth()->id();

        if ($request->hasFile('image')) {
            if ($oldImage) {
                Storage::delete($oldImage);
            }

            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $resizeImage = Image::make($image->getRealPath())->orientate()->fit(200, 200);
            $resizeImage->save(public_path('storage/post-animal/' . $filename));
            $animal->image = 'storage/post-animal/' . $filename;
        }

        $rescue->name_pets = $request->input('name_pets');
        $rescue->age = $request->input('age');
        $rescue->gender = $request->input('gender');
        $rescue->category = $request->input('category');
        $rescue->location = $request->input('location');
        $rescue->date = $request->input('date');
        $rescue->information = $request->input('information');
        $rescue->status = $request->input('status');
        $rescue->save();

        $detailRescue->name_contact = $request->input('name_contact');
        $detailRescue->phone = $request->input('phone');
        $detailRescue->admin_id = $adminId;
        $detailRescue->save();

        if ($rescue) {
            return redirect()
                ->route('rescue.list')
                ->with(['success' => 'Data rescue telah berhasil diperbarui']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function deleteRescue($id)
    {
        $rescue = Rescue::findOrFail($id);
        $details = DetailRescue::where('rescue_id', $id)->firstOrFail();

        if ($rescue && $details) {
            $rescue->delete();
            $details->delete();

            return redirect()->back()->with('success', 'Data rescue berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba kembali');
        }
    }

    public function trashRescue()
    {
        $rescues = Rescue::onlyTrashed()->get();
        $details = DetailRescue::onlyTrashed()->get();
        return view('admin.animals.rescue.trash-rescue', compact('rescues', 'details'));
    }

    public function restoreRescue($id)
    {
        $rescue = Rescue::withTrashed()->findOrFail($id);
        $details = DetailRescue::withTrashed()->findOrFail($id);
        if ($rescue->trashed()) {
            $rescue->restore();
            $details->restore();
            return redirect()->back()->with('success', 'Data rescue berhasil dipulihkan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba kembali');
        }
    }

    public function rescuePDF(Request $request)
    {
        $bulanTerpilih = $request->input('bulan', date('m'));
        $tahunTerpilih = $request->input('tahun', date('Y'));

        $rescues = Rescue::with('detailRescue')
            ->whereMonth('updated_at', $bulanTerpilih)
            ->whereYear('updated_at', $tahunTerpilih)
            ->get();

        return view('admin.animals.rescue.pdf-rescue', compact('rescues', 'tahunTerpilih'));
    }

    public function rescueExcel()
	{
		return Excel::download(new RescueExport, 'Laporan-Rescue.xlsx');
	}
}
