<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalRecordRequest;
use App\Models\MedicalRecord;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MedicalRecordController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $medicalRecords = MedicalRecord::all();
        return view('MedicalRecords.index')->with(compact('medicalRecords'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMedicalRecordRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMedicalRecordRequest $request): RedirectResponse
    {
        MedicalRecord::create($request->all());
        return redirect()->back()->with('message', 'Registro creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param MedicalRecord $medicalRecord
     * @return Application|Factory|View
     */
    public function show(MedicalRecord $medicalRecord)
    {
        return view('MedicalRecords.show')->with(compact('medicalRecord'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MedicalRecord $medicalRecord
     * @return RedirectResponse
     */
    public function destroy(MedicalRecord $medicalRecord): RedirectResponse
    {
        $medicalRecord->delete();
        return redirect()->back()->with('message', 'Registro borrado exitosamente');

    }
}
