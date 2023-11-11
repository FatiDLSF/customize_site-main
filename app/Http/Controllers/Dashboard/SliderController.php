<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class SliderController extends Controller
{
    // Display a listing of the resource.
    public function index(): View
    {
        $user = auth()->user();
        $site_web_id = $user->sites_web->id;
        $sliders = Slider::where('site_web_id', $site_web_id)->get(); // <- este pinche get o frish que se joda

        return view('dashboard.sliders', ['sliders' => $sliders]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        $user = auth()->user();
        $site_web_id = $user->sites_web->id;
        $sliders = Slider::where('site_web_id', $site_web_id)->get();

        return view('dashboard.sliders', ['sliders' => $sliders, 'modal' => true]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'imagen' => 'required',
            'link' => 'required',
            'spam' => 'required',
            'activo' => 'required'
        ]);

        $name_image = auth()->user()->name . '_' . $request->file('imagen')->getClientOriginalName();
        $ruta = 'resources/web/customize/sliders/' . $name_image;
        Image::make($request->file('imagen'))->fit(1600, 800)->save($ruta);

        /*  Image::make($request->file('imagen'))
            ->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($ruta); */

        Slider::create([
            'site_web_id' =>  auth()->user()->sites_web->id,
            'titulo' => $request->titulo,
            'imagen' => $name_image,
            'link' => $request->link,
            'spam' => $request->spam,
            'activo' => $request->activo
        ]);

        return redirect()->route('dashboard.sliders.index');
    }

    // Display the specified resource.
    public function show(string $id)
    {
        //
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        $slider = Slider::where('id', $id)->first();

        $user = auth()->user();
        $site_web_id = $user->sites_web->id;
        $sliders = Slider::where('site_web_id', $site_web_id)->get();

        return view('dashboard.sliders', ['sliders' => $sliders, 'modal' => true, 'slider' => $slider]);
    }

    // Update the specified resource in storage.
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sliders,id',
            'link' => 'required',
            'spam' => 'required',
            'activo' => 'required'
        ]);

        $slider = Slider::findOrFail($request->id);


        if ($request->hasFile('imagen')) {
            $name_image = auth()->user()->name . '_' . $request->file('imagen')->getClientOriginalName();
            $ruta = 'resources/web/customize/sliders/';

            if (File::exists($ruta . $slider->imagen)) {
                File::delete($ruta . $slider->imagen);
            }

            Image::make($request->file('imagen'))->fit(1600, 800)->save($ruta . $name_image);

            $slider->imagen = $name_image;
        }

        $slider->titulo = $request->titulo;
        $slider->link = $request->link;
        $slider->spam = $request->spam;
        $slider->activo = $request->activo;

        $slider->save();

        return redirect()->route('dashboard.sliders.index');
    }

    // Remove the specified resource from storage.
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:sliders,id',
        ]);

        $slider = Slider::findOrFail($request->id);

        $slider->delete();

        return redirect()->route('dashboard.sliders.index');
    }
}
