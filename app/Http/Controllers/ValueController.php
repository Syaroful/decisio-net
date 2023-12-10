<?php

namespace App\Http\Controllers;

use App\Models\Value;
use App\Http\Requests\StoreValueRequest;
use App\Http\Requests\UpdateValueRequest;
use App\Models\Alternative;
use App\Models\Criteria;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternative = Alternative::all();
        $criteria = Criteria::all();
        $value = Value::with('criteria', 'alternative')->get();
        return view('dashboard.score', compact(['value', 'alternative', 'criteria']));

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
        $request->validated(
            [
                'id_alternative' => 'required|exists:alternatives,id',
                'value' => 'required|numeric|min:0,01|max:1',
            ]
        );
        $alternative_id = $request->input('alternative_id');
        $value = $request->input('value');

        foreach ($alternative_id as $key => $value) {
            $data = [
                'alternative_id' => $alternative_id[$key],
                'criteria_id' => $key,
                'value' => $value,
            ];
            Value::updateOrCreate($data);
        }
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
    public function update(UpdateValueRequest $request, Value $value)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Value $value)
    {
        //
    }
}
