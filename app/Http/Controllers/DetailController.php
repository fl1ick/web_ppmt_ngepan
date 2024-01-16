<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class DetailController extends Controller
{
    public function show(Destination $destination)
    {
        return view('frontend.destination.detail', compact('destination'));
    }
}
