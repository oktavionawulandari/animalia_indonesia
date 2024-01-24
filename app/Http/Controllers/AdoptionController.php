<?php

namespace App\Http\Controllers;
use App\Models\Adoption;
use Illuminate\Support\Facades\DB;
use App\Models\Animal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{

    public function statusAdoption($id)
    {
        $animal = Animal::findOrFail($id);
        $adopterId = auth()->id();

        if (!$animal) {
            return redirect()->route('adopter.data.animal')->with(['error' => 'Hewan tidak ditemukan']);
        }

        $adoption = new Adoption();
        $adoption->animal_id = $animal->id;
        $adoption->adopter_id = $adopterId;
        $adoption->adoption = 'Pending';
        $adoption->message = 'Data Sedang Diproses Harap Tunggu Paling Lambat 7 Hari';
        $adoption->save();

        $animal->status = 'Pending';
        $animal->save();

        return redirect()->route('adopter.data.animal')->with(['success' => 'Data adopsi berhasil diproses']);
    }

    public function AnimalList(Request $request)
    {
        $query = Animal::whereIn('status', ['Free']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $animals = $query->paginate(9);

        return view('adopter.adoption.list-adoption', compact('animals'))
            ->with('name', $name ?? '');
    }

    public function dogsList(Request $request)
    {
        $adoptions = Adoption::all();
        $query = Animal::whereIn('status', ['Free'])->whereIn('category', ['dogs']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $animals = $query->paginate(9);

        return view('adopter.adoption.list-dogs', compact('animals'))
        ->with('name', $name ?? '');
    }

    public function catsList(Request $request)
    {

        $adoptions = Adoption::all();
        $query = Animal::whereIn('status', ['Free'])->whereIn('category', ['cats']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $animals = $query->paginate(9);

        return view('adopter.adoption.list-cats', compact('animals'))
        ->with('name', $name ?? '');
    }


    public function status()
    {
        $adoptions = Adoption::where('adopter_id', Auth::user()->id)->get();
        $animals = Animal::whereIn('id', $adoptions->pluck('animal_id'))->get();
        return view('adopter.status', compact('adoptions', 'animals'));
    }
}
