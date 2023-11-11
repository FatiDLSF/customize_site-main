<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Site_Web;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioDashboardController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {

        $site_web = Site_Web::where('user_id', Auth::id())->first();
        if ($site_web) {

            $site_web = Site_Web::where('user_id', Auth::id())->first();

            $sliders = Slider::where('site_web_id', $site_web->id)->get();

            return view(
                'dashboard.index',
                [
                    'site_web' => $site_web,
                    'sliders' => $sliders
                ]
            );
        } else {

            return view('dashboard.index');
        }
    }

    // Show the form for creating a new resource.
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
