<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseDadosController extends Controller
{
    public function index(Request $request) {
        return view('base_dados.layout');
    }
}
