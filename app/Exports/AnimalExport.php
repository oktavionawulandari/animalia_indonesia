<?php

namespace App\Exports;

use App\Models\Animal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AnimalExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Animal::all();
    // }

    public function view(): View
    {
        // return Rescue::all();

        return view('admin.animals.animal.excel-animal', [
            'animals' => Animal::all(),
        ]);
    }
}
