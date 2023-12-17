<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreAlternativeRequest;
use App\Http\Requests\UpdateAlternativeRequest;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::orderBy('id')->get();
        $lastAlternativeId = Alternative::orderBy('id', 'desc')->first()->id ?? 0;

        $title = 'Hapus Kriteria!';
        $text = "Apakah anda yakin ingin menghapus data ini?";
        confirmDelete($title, $text);

        return view('dashboard.alternative', compact('alternatives', 'lastAlternativeId'));
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
    public function store(StoreAlternativeRequest $request)
    {
        $data = $request->validated();
        Alternative::create($data);
        Alert::success('Success', 'Data alternative berhasil ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternative $alternative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlternativeRequest $request, Alternative $alternative)
    {
        $alternative = Alternative::findOrFail($request->id);
        $data = $request->validated();
        $alternative->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternative $alternative)
    {
        try {
            DB::table('alternatives')->where('id', $alternative->id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->back()->with('warning', 'Data kriteria gagal dihapus karena masih terdapat data alternatif yang menggunakan kriteria ini');
            }

        }
        Alert::success('Success', 'Data alternative berhasil dihapus');
        return redirect()->back()->with('success', 'Data alternative berhasil dihapus');
    }
}
