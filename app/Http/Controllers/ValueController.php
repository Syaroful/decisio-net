<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;
use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\Value;
use RealRashid\SweetAlert\Facades\Alert;


class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatives = Alternative::all();
        $criteria = Criteria::all();
        $value = Value::all();
        return view('dashboard.score', compact(['criteria', 'alternatives', 'value']));
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
    public function store(StoreValueRequest $request)
    {
        $request->validate(
            [
                'alternative_id' => 'required|exists:alternatives,id',
                'score.*' => 'required|numeric|min:0,01|max:1',
            ]
        );
        $alternative_id = $request->input('alternative_id');
        $valueData = $request->input('score');

        foreach ($valueData as $criteria_id => $score) {
            Value::updateOrCreate(
                [
                    'alternative_id' => $alternative_id,
                    'criteria_id' => $criteria_id,
                ],
                [
                    'score' => $score,
                ]
            );
        }
        Alert::success('Success', 'Data nilai berhasil ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Value $value)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Value $value)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateValueRequest $request, Alternative $alternative)
    {
        $request->validate(
            [
                'alternative_id' => 'required|exists:alternatives,id',
                'score.*' => 'required|numeric|min:0,01|max:1',
            ]
        );
        $alternative_id = $request->input('alternative_id');
        $valueData = $request->input('score');

        foreach ($valueData as $criteria_id => $score) {
            Value::updateOrCreate(
                [
                    'alternative_id' => $alternative_id,
                    'criteria_id' => $criteria_id,
                ],
                [
                    'score' => $score,
                ]
            );
        }
        Alert::success('Success', 'Data nilai berhasil ditambahkan');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Value $value)
    {
        //
    }
}
