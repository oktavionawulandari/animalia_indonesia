<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Adopter;
use App\Models\Rescue;
use App\Models\DetailRescue;

class LandingController extends Controller
{
    public function LandingPage()
    {
        return view('landing-page.landing');
    }

    public function AboutUs()
    {
        return view('landing-page.about');
    }

    public function AnimalList(Request $request)
    {
        $query = Animal::whereIn('status', ['Free']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $animals = $query->paginate(9);

        return view('landing-page.animals.animal', compact('animals'))
        ->with('name', $name ?? '');
    }

    public function dogsList(Request $request)
    {
        $query = Animal::whereIn('status', ['Free'])->whereIn('category', ['dogs']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $animals = $query->paginate(9);

        return view('landing-page.animals.dogs', compact('animals'))
        ->with('name', $name ?? '');
    }

    public function catsList(Request $request)
    {
        $query = Animal::whereIn('status', ['Free'])->whereIn('category', ['cats']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $animals = $query->paginate(9);

        return view('landing-page.animals.cats', compact('animals'))
        ->with('name', $name ?? '');
    }

    public function listRescue(Request $request)
    {
        $query = Rescue::with('detailRescue');

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $rescues = $query->paginate(9);

        return view('landing-page.rescue.rescue', compact('rescues'))
        ->with('name', $name ?? '');
    }

    public function listDogsRescue(Request $request)
    {
        $query = Rescue::with('detailRescue')->whereIn('category', ['Dogs']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $rescues = $query->paginate(9);

        return view('landing-page.rescue.dogs', compact('rescues'))
            ->with('name', $name ?? '');
    }

    public function listCatsRescue(Request $request)
    {
        $query = Rescue::with('detailRescue')->whereIn('category', ['Cats']);

        if ($request->has('name_pets')) {
            $name = $request->input('name_pets');
            $query->where('name_pets', 'like', '%' . $name . '%');
        }

        $rescues = $query->paginate(9);

        return view('landing-page.rescue.cats', compact('rescues'))
        ->with('name', $name ?? '');
    }
}
