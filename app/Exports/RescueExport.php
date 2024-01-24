<?php

namespace App\Exports;

use App\Models\Rescue;
use App\Models\DetailRescue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RescueExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // return Rescue::all();

        return view('admin.animals.rescue.excel-rescue', [
            'rescues' => Rescue::with('detailRescue')->get(),
        ]);
    }
}
