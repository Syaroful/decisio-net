<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\Criteria;

class HomeController extends Controller
{
    public function index(){
        $latestAlternatives = Alternative::orderBy('id', 'desc')->first();
        $latestCriterias = Criteria::orderBy('id', 'desc')->first();

        return view('dashboard.home', compact('latestAlternatives', 'latestCriterias'));
    }
}
