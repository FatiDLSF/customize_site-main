<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InicioWebController extends Controller
{
    // Display a listing of the resource.
    public function index(): View
    {
        return view('web.index');
    }
}
