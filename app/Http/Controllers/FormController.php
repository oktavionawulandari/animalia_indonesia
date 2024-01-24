<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Http\JsonResponse;
use App\Models\Adopter;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function cetak_pdf()
    {
        return view('adopter.syarat-adopt');
    }

    public function uploadSyarat(Request $request)
    {
        $this->validate($request, [
            'document' => 'required|mimes:pdf,docx,doc',
            'form' => 'required',
        ]);

        $adopter = auth()->user();

        $form = Form::create([
            'document' => $request->document,
            'form' => $request->form,
            'adopter_id' => $adopter->id,
        ]);


        if ($request->hasFile('document')) {
            $document = $request->file('document');
            $extension = $document->getClientOriginalExtension();

            $id = uniqid();
            $filename = $id . '.' . $extension;

            $path = Storage::disk('public')->putFileAs('post-document', $document, $filename);
            $form->document = $path;
        }

        $form->save();

        if ($form) {
            return redirect()
                ->route('dashboard.adopter')
                ->with(['success' => 'Formulir berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali',
                ]);
        }
    }
}
