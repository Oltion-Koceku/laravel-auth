<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Technologie;



class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technologie::all();

        return view('admin.technologie.index', compact('technologies'));
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
    public function store(Request $request)
    {
        $exist = Technologie::where('title', $request->title)->first();

        if ($exist) {

            return redirect()->route('admin.technologies.index')->with('error', 'Questo TITOLO esiste già!');
        } else {

            $new_technologie = new Technologie();

            $new_technologie->title = $request->title;
            $new_technologie->slug = Helper::makeSlug($new_technologie->title, Technologie::class);

            $new_technologie->save();

            return redirect()->route('admin.technologies.index')->with('good', 'Il Progetto è stato aggiunto con successo');
        }
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
    public function update(Request $request, Technologie $technology)
    {
        $val_data = $request->validate([
            "title" => "required|min:4|max:100"
        ], [
            "title.required" => "Devi inserire il nome del progetto",
            "title.min" => "Il titolo deve essere lungo almeno :min caratteri",
            "title.max" => "Il titolo deve essere lungo al massimo :max caratteri"
        ]);

        // Verifica se il titolo aggiornato è diverso dal titolo originale
        if ($request->title !== $technology->title) {
            $val_data['slug'] = Helper::makeSlug($request->title, Technologie::class);
        }

        $technology->update($val_data);

        return redirect()->route('admin.technologies.index')->with('good', 'Il Progetto è stato aggiornato con successo');
    }

    public function destroy(Technologie $technology)
    {
        $technology->delete();

        return redirect()->route('admin.technologies.index')->with('good', 'Progetto eliminato correttamente');
    }
}
