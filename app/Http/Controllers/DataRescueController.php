<?php

namespace App\Http\Controllers;

use App\Models\Rescue;
use App\Models\DetailRescue;
use Illuminate\Http\Request;

class DataRescueController extends Controller
{


    public function listRescue(Request $request)
    {
        $query = Rescue::with('detailRescue');

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $rescues = $query->paginate(9);

        return view('adopter.rescue.list-rescue', compact('rescues'))
        ->with('name', $name ?? '');
    }

    public function listCatsRescue(Request $request)
    {
        $rescues = Rescue::with('detailRescue')->get();
        $query = Rescue::whereIn('category', ['Cats']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $rescues = $query->paginate(9);

        return view('adopter.rescue.cats-rescue', compact('rescues'))
        ->with('name', $name ?? '');
    }

    public function listDogsRescue(Request $request)
    {
        $rescues = Rescue::with('detailRescue')->get();
        $query = Rescue::whereIn('category', ['Dogs']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $rescues = $query->paginate(9);

        return view('adopter.rescue.dogs-rescue', compact('rescues'))
        ->with('name', $name ?? '');
    }

}
