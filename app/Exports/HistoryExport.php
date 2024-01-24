<?php

namespace App\Exports;

use App\Models\Adoption;
use App\Models\DetailAdoption;
use App\Models\Form;
use App\Models\Animal;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HistoryExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.users.history.excel-history', [
            'adoptions' => Adoption::with('adopter.detailAdopter', 'adopter.form', 'animal')->get(),
        ]);
    }
}
