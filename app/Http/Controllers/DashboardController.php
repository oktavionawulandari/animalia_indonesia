<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Adopter;
use App\Models\User;
use App\Models\DetailAdopter;
use App\Models\Form;


class DashboardController extends Controller
{
    public function homeAdmin()
    {
         //TOTAL ADMIN
         $data_admin = DB::table('admins')
         ->select(DB::raw('count(id) as jml_admin'))
         ->get();
     foreach ($data_admin as $row) {
         $jml_admin = $row->jml_admin;
         }
         $data['totalAdmin'] = (int) $jml_admin;

        //TOTAL ACCOUNT
        $data_adopters = DB::table('adopters')
            ->select(DB::raw('count(id) as jml_account'))
            ->get();
        foreach ($data_adopters as $row) {
            $jml_account = $row->jml_account;
            }
            $data['totalAccount'] = (int) $jml_account;

          //TOTAL ADOPTER
        $data_adopters = Adopter::whereHas('form', function ($query) {
            $query->where('form', 'Filled');
        })
        ->select(DB::raw('count(id) as jml_adopters'))
        ->get();

        foreach ($data_adopters as $row) {
            $jml_adopters = $row->jml_adopters;
        }

        $data['totalAdopters'] = (int) $jml_adopters;


        //TOTAL HEWAN
        $data_animals = DB::table('animals')
            ->select(DB::raw('count(id) as jml_animals'))
            ->get();
        foreach ($data_animals as $row) {
                $jml_animals = $row->jml_animals;
            }
           $data['totalAnimals'] = (int) $jml_animals;

        //TOTAL RESCUE
        $data_rescues = DB::table('rescues')
            ->select(DB::raw('count(id) as jml_rescues'))
            ->get();
        foreach ($data_rescues as $row) {
            $jml_rescues = $row->jml_rescues;
        }
            $data['totalRescues'] = (int) $jml_rescues;

        // TOTAL ADOPSI
        $data_adoption = DB::table('adoptions')
            ->select(DB::raw('count(id) as jml_adoptions'))
            ->get();
        foreach ($data_adoption as $row) {
            $jml_adoption = $row->jml_adoptions;
        }
        $data['totalAdoption'] = (int) $jml_adoption;

        //JUMLAH ADOPSI BERHASIL
        $success = DB::table('adoptions')
            ->select(DB::raw('count(id) as jml_success'))
            ->whereRaw('adoption="Success"')
            ->get();
        foreach ($success as $row) {
            $jml_success = $row->jml_success;
        }
        $data['totalSuccess'] = (int) $jml_success;

        //JUMLAH ADOPSI GAGAL
        $failed = DB::table('adoptions')
            ->select(DB::raw('count(id) as jml_failed'))
            ->whereRaw('adoption="Failed"')
            ->get();
        foreach ($failed as $row) {
            $jml_failed = $row->jml_failed;
        }
        $data['totalFailed'] = (int) $jml_failed;

        //JUMLAH PERBAIKAN DATA
        $error = DB::table('adoptions')
            ->select(DB::raw('count(id) as jml_error'))
            ->whereRaw('adoption="Error"')
            ->get();
        foreach ($error as $row) {
            $jml_error = $row->jml_error;
        }
        $data['totalError'] = (int) $jml_error;

        //JUMLAH DATA PENDING
        $pending = DB::table('adoptions')
            ->select(DB::raw('count(id) as jml_pending'))
            ->whereRaw('adoption="Pending"')
            ->get();
        foreach ($pending as $row) {
            $jml_pending = $row->jml_pending;
        }
        $data['totalPending'] = (int) $jml_pending;

        //JUMLAH RESCUE
        $cats_rescue = DB::table('rescues')
            ->select(DB::raw('count(id) as jml_cats_rescues'))
            ->whereRaw('category="Cats"')
            ->get();
        foreach ($cats_rescue as $row) {
            $jml_cats_rescues = $row->jml_cats_rescues;
        }
        $data['totalCats'] = (int) $jml_cats_rescues;

        $dogs_rescue = DB::table('rescues')
            ->select(DB::raw('count(id) as jml_dogs_rescues'))
            ->whereRaw('category="Dogs"')
            ->get();
        foreach ($dogs_rescue as $row) {
            $jml_dogs_rescues = $row->jml_dogs_rescues;
        }
        $data['totalDogs'] = (int) $jml_dogs_rescues;

        //ANIMAL
    $cats_rescue = DB::table('animals')
        ->select(DB::raw('count(id) as jml_cats_animal'))
        ->whereRaw('category="Cats"')
        ->get();
    foreach ($cats_rescue as $row) {
        $jml_cats_animal = $row->jml_cats_animal;
    }
        $data['totalCatsAnimal'] = (int) $jml_cats_animal;

    $dogs_animal = DB::table('animals')
        ->select(DB::raw('count(id) as jml_dogs_animal'))
        ->whereRaw('category="Dogs"')
        ->get();
    foreach ($dogs_animal as $row) {
        $jml_dogs_animal = $row->jml_dogs_animal;
    }
    $data['totalDogsAnimal'] = (int) $jml_dogs_animal;

        if (Auth::guard('admin')->check()) {
            $admin = Auth::guard('admin')->user();
            if ($admin->level == "Master Admin") {
                return view('dashboard.dashboard-superadmin', $data);
            } elseif ($admin->level == "Admin") {
                return view('dashboard.dashboard-admin', $data);
            }
        }
    }

    public function homeadopter()
    {
        $detailAdopter = DetailAdopter::where('adopter_id', Auth::user()->id)->first();
        $isDataFilled = $detailAdopter ? true : false;

        $forms = Form::where('adopter_id', Auth::user()->id)->first();
        $isDataFilledForms = $forms ? true : false;

        return view('dashboard.home-adopter', compact('isDataFilled', 'isDataFilledForms'));
    }

}
