<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adopter;
use App\Models\Adoption;
use App\Models\DetailAdopter;
use App\Models\Form;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Exports\AdopterExport;
use Maatwebsite\Excel\Facades\Excel;


class DataController extends Controller
{
    public function adopterData()
    {
        $adopters = Adopter::with('detailAdopter.regency', 'detailAdopter.subDistrict', 'form')
        ->whereHas('form', function ($query) {
            $query->where('form', 'filled');
        })->get();
        return view('admin.users.adoption.data-adoption', compact('adopters'));
    }

    public function downloadData($id)
    {
        set_time_limit(300);
        $adopter = Adopter::with('detailAdopter', 'detailAdopter.regency', 'detailAdopter.subDistrict', 'form')->findOrFail($id);

        $pdf = PDF::loadView('admin.users.adoption.download-data', compact('adopter'));
        return $pdf->download($adopter->detailAdopter->full_name . '.pdf');
    }

    public function cetakDataPengadopsi(Request $request)
    {
        $bulanTerpilih = $request->input('bulan', date('m'));
        $tahunTerpilih = $request->input('tahun', date('Y'));

        $adopters = Adopter::with('detailAdopter.regency', 'detailAdopter.subDistrict', 'form')
            ->whereHas('form', function ($query) use ($bulanTerpilih, $tahunTerpilih) {
                $query->where('form', 'filled')
                    ->whereMonth('updated_at', $bulanTerpilih)
                    ->whereYear('updated_at', $tahunTerpilih);
            })
            ->get();

        return view('admin.users.adoption.pdf-adoption', compact('adopters', 'tahunTerpilih'));
    }

    public function adopterExcel()
	{
		return Excel::download(new AdopterExport, 'adopter-data.xlsx');
	}


    public function downloadDocument($id)
    {
        $form = Form::findOrFail($id);

        $filePath = storage_path('app/public/' . $form->document);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return back()
                ->with(['error' => 'File not found']);
        }
    }
}
