<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Intervention\Image\Facades\Image;
use App\Models\Adopter;
use App\Models\Adoption;
use App\Models\Admin;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Exports\AnimalExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function ValidationAdoption()
    {
        $adoptions = Adoption::with('animal', 'admin', 'adopter', 'detailAdopter', 'form')->whereIn('status', ['Pending'])->get();
        return view('admin.users.adoption.validation-adoption', compact('adoptions'));
    }

    public function catsList()
    {
        $animals = Animal::whereIn('category', ['Cats'])->get();
        return view('admin.animals.animal.cats-animal', compact('animals'));
    }

    public function dogsList()
    {
        $animals = Animal::whereIn('category', ['Dogs'])->get();
        return view('admin.animals.animal.dogs-animal', compact('animals'));
    }

    public function AnimalList()
    {
        $animals = Animal::all();
        return view('admin.animals.animal.animal', compact('animals'));
    }

    public function detailAnimal($id)
    {
        $animal = Animal::findOrFail($id);
        return view('admin.animals.animal.details-animal', compact('animals'));

        return response()->json([
            'animal' => $animal,
        ]);
    }

    public function createAnimal()
    {
        $animals = Animal::all();
        $adoptions = Adoption::all();
        return view('admin.animals.animal.create-animal', compact('animals'));
    }

    public function storeAnimals(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file',
            'name_pets' => 'required|string',
            'age' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'ras' => 'required',
            'vaccine'  => 'required',
            'information' => 'required',
            'description'  => 'required',
            'status' => 'required',
            'video' => 'required|file|mimetypes:video/mp4,video/webm,video/ogg',
        ]);

        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $resizeImage = Image::make($image->getRealPath())->orientate()->fit(200, 200);
        $resizeImage->save(public_path('storage/post-animal/' . $filename));
        if($request ->hasFile('image')){
            $validatedData['image'] = $request->image = 'storage/post-animal/' . $request->file('image')->getClientOriginalName();
        }

        $video = $request->file('video');
        $videoFilename = $video->getClientOriginalName();
        $video->move(public_path('storage/post-video/'), $videoFilename);
        $validatedData['video'] = 'storage/post-video/' . $videoFilename;

        $description = substr($validatedData['description'], 0, 255);

        $animals = Animal::create([
            'image' => $validatedData['image'],
            'name_pets' => $validatedData['name_pets'],
            'age' => $validatedData['age'],
            'gender' => $validatedData['gender'],
            'category' => $validatedData['category'],
            'ras' => $validatedData['ras'],
            'vaccine' => $validatedData['vaccine'],
            'information' => $validatedData['information'],
            'description' => $description,
            'status' => $validatedData['status'],
            'video' => $validatedData['video'],
        ]);

        if ($animals) {
            return redirect()
                ->route('animals.list')
                ->with(['success' => 'Data hewan telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }

    public function editAnimal($id)
    {
        $animal = Animal::findOrFail($id);
        return view('admin.animals.animal.edit-animal', compact('animal'));
    }

    public function updateAnimal(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|file|max:6024',
            'name_pets' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'category' => 'required',
            'ras' => 'required',
            'vaccine' => 'required',
            'information' => 'required',
            'description' => 'required',
            'video' => 'file|mimetypes:video/mp4,video/webm,video/ogg',
        ]);

        $animal = Animal::findOrFail($id);
        $oldImage = $animal->image;
        $oldVideo = $animal->video;

        $description = substr($request->input('description'), 0, 255);

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

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoFilename = $video->getClientOriginalName();
            $video->move(public_path('storage/post-video/'), $videoFilename);
            $animal->video = 'storage/post-video/' . $videoFilename;
        } elseif ($request->input('video_old')) {
            $animal->video = $request->input('video_old');
        }

        $animal->name_pets = $request->input('name_pets');
        $animal->age = $request->input('age');
        $animal->gender = $request->input('gender');
        $animal->category = $request->input('category');
        $animal->ras = $request->input('ras');
        $animal->vaccine = $request->input('vaccine');
        $animal->information = $request->input('information');
        $animal->description =  $request->input('description');
    //    $animal->video = $request->input('video');
        $animal->save();

        if ($animal) {
            return redirect()
                ->route('animals.list')
                ->with(['success' => 'Data hewan telah berhasil diperbarui']);
        } else {
            return back()
                ->withInput()
                ->with(['error' => 'Terjadi kesalahan, silahkan coba kembali']);
        }
    }

    public function deleteAnimal($id)
    {
        $animal = Animal::findOrFail($id);

        if ($animal) {
            $animal->delete();

            return redirect()->back()->with('success', 'Hewan berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba kembali');
        }
    }


    public function trashAnimal()
    {
        $animals = Animal::onlyTrashed()->get();
        return view('admin.animals.animal.trash-animal', compact('animals'));
    }

    public function restoreAnimal($id)
    {
        $animal = Animal::withTrashed()->findOrFail($id);
        $adoption = Adoption::where('animal_id', $id)->first();

        if ($animal->trashed())
        {
            $animal->restore();
            return redirect()->back()->with('success', 'Hewan berhasil dipulihkan.');
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba kembali');
        }
    }

    // public function animalPDF()
    // {
    //     $animals = Animal::get();
    //     return view('admin.animals.animal.pdf-animal', compact('animals'));
    // }

    public function animalPDF(Request $request)
    {
        $bulanTerpilih = $request->input('bulan', date('m'));
        $tahunTerpilih = $request->input('tahun', date('Y'));

        $animals = Animal::whereMonth('updated_at', $bulanTerpilih)
            ->whereYear('updated_at', $tahunTerpilih)
            ->get();

        return view('admin.animals.animal.pdf-animal', compact('animals'));
    }

    public function animalExcel()
	{
		return Excel::download(new AnimalExport, 'Laporan-Animals.xlsx');
	}
}
