<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VetController extends Controller
{
    public function catchResponse(Request $request)
    {
      return view('vet/catchResponse', [
        'name' => $name,

      ]);
    }
    return catchResponse;
}
