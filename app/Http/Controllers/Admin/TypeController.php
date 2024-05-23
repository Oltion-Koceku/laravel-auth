<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Models\Type;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.type.index', compact('types'));
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
        $exist = Type::where('title', $request->title)->first();

        if ($exist) {

            return redirect()->route('admin.types.index')->with('error', 'Questo TITOLO esiste già!');
        }else{

            $new_type = new Type();

            $new_type->title = $request->title;
            $new_type->slug = Helper::makeSlug($new_type->title, Type::class);

            $new_type->save();

            return redirect()->route('admin.types.index')->with('good', 'Il Progetto è stato aggiunto con successo');
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
    public function update(Request $request, Type $type)
    {
        $val_data = $request->validate([

            "title" => "required|min:4|max:100"

        ],

        [

            "title.required" => "Devi inserire il nome del progetto",
            "title.min" => "ci devono essere almeno :min caratteri",
            "title.max" => "ci sono più di :max caratteri"

        ]);

        $exist = Type::where('title', $request->title)->first();

        if ($exist) {

            return redirect()->route('admin.types.index')->with('error', 'Questo TITOLO esiste già!');
        }else{


            $val_data['slug'] = Helper::makeSlug($request->title, Type::class);

            $type->update($val_data);

            return redirect()->route('admin.types.index')->with('good', 'Il Progetto è stato aggiunto con successo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('good', "Progetto eliminato correttamnete");
    }
}
