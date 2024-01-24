<?php

namespace App\Http\Controllers;
use App\Models\Adopter;
use App\Models\Animal;
use App\Models\Admin;
use App\Models\DetailAdopter;
use App\Models\Adoption;
use App\Models\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\HistoryExport;
use Maatwebsite\Excel\Facades\Excel;

class ValidationController extends Controller
{

    //HISTORY
    public function historyAdoption()
    {
        $adoptions = Adoption::with('animal', 'admin', 'adopter', 'adopter.detailAdopter', 'adopter.form')->get();
        return view('admin.users.history.history-adoption', compact('adoptions'));
    }

    public function historyPDF(Request $request)
    {
        $bulanTerpilih = $request->input('bulan', date('m'));
        $tahunTerpilih = $request->input('tahun', date('Y'));

        $adoptions = Adoption::with('animal', 'admin', 'adopter', 'adopter.detailAdopter', 'adopter.form')
            ->whereMonth('updated_at', $bulanTerpilih)
            ->whereYear('updated_at', $tahunTerpilih)
            ->get();

        return view('admin.users.history.pdf-history', compact('adoptions'));
    }

    public function historyExcel()
	{
		return Excel::download(new HistoryExport, 'history-adoption.xlsx');
	}

    //VALIDASI
    public function validationAdoption()
    {
        $adoptions = Adoption::with('animal', 'admin', 'adopter', 'adopter.detailAdopter', 'adopter.form')->whereIn('adoption', ['Pending'])->get();
        return view('admin.users.adoption.validation-adoption', compact('adoptions'));
    }

    public function validationFailed(Request $request, $id)
    {
        $adoption = Adoption::findOrFail($id);

        $adoption->adoption = 'Failed';
        $adoption->message = 'Anda tidak memenuhi syarat untuk melakukan adopsi';
        $adoption->save();

        $animal = Animal::findOrFail($adoption->animal_id);

        $animal->status = 'Free';
        $animal->save();

        return redirect()
                ->route('validation.adoption')
                ->with(['success' => 'Data adopsi berhasil diproses']);
    }

    public function validationSuccess(Request $request, $id)
    {
        $adoption = Adoption::findOrFail($id);

        $adoption->adoption = 'Success';
        $adoption->message = null;
        $adoption->save();

        $animal = Animal::findOrFail($adoption->animal_id);

        $animal->status = 'Success';
        $animal->save();

        return redirect()
                ->route('validation.adoption')
                ->with(['success' => 'Data adopsi berhasil diproses']);
    }


    public function validationError(Request $request, $id)
    {
        $adoption = Adoption::findOrFail($id);
        $animal = Animal::findOrFail($adoption->animal_id);

        $adoption->adoption = 'Error';
        $adoption->message = $request->input('message');
        $adoption->save();

        $animal->status = 'Error';
        $animal->save();

        return redirect()->route('validation.adoption')->with(['success' => 'Data adopsi berhasil diproses']);
    }
}
