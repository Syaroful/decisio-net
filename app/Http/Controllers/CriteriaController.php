<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdateCriteriaRequest;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criteria = Criteria::orderBy('id')->get();

        $title = 'Hapus Kriteria!';
        $text = "Apakah anda yakin ingin menghapus data ini?";
        confirmDelete($title, $text);

        return view('dashboard.criteria', compact('criteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCriteriaRequest $request)
    {
        $data = $request->validated();
        Criteria::create($data);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Criteria $criteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCriteriaRequest $request, Criteria $criteria)
    {
        $criteria = Criteria::findOrFail($request->id);
        $data = $request->validated();
        $criteria->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria)
    {
        try {
            DB::table('criterias')->where('id', $criteria->id)->delete();
        }catch(\Illuminate\Database\QueryException $e){
            if($e->getCode() == "23000")
                return redirect()->back()->with('warning', 'Data kriteria gagal dihapus karena masih terdapat data alternatif yang menggunakan kriteria ini');
        }
        Alert::success('Success', 'Data kriteria berhasil dihapus');
        return redirect()->back()->with('success', 'Data kriteria berhasil dihapus');
    }
}
