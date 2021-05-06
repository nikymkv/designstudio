<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('web.portfolio');
    }
}
