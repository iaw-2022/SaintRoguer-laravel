<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Art;

class ArtController extends Controller
{
    public function index()
    {
        $arts = Art::paginate(10);

        return view('arts.index', compact('arts'));
    }
}
