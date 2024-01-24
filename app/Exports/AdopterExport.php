<?php

namespace App\Exports;

use App\Models\Adopter;
use App\Models\DetailAdopter;
use App\Models\Form;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AdopterExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $adopters = Adopter::with('detailAdopter.regency', 'detailAdopter.subDistrict', 'form')
        ->whereHas('form', function ($query) {
            $query->where('form', 'filled');
        })
        ->get();

        return view('admin.users.adoption.excel-adoption', [
            'adopters' => $adopters,
        ]);
    }
}
