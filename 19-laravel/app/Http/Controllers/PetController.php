<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PetsExport;
use App\Imports\PetsImport;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::orderBy('id', 'desc')->paginate(12);
        return view('pets.index')->with('pets', $pets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'        => ['required', 'string'],
            'kind'        => ['required', 'string'],
            'breed'       => ['required', 'string'],
            'age'         => ['required', 'integer'],
            'weight'      => ['required', 'numeric'],
            'location'    => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'image'       => ['required', 'image'],
        ]);

        if ($validation) {
            if ($request->hasFile('image')) {
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
            }

            $pet = new Pet;
            $pet->name        = $request->name;
            $pet->kind        = $request->kind;
            $pet->breed       = $request->breed;
            $pet->age         = $request->age;
            $pet->weight      = $request->weight;
            $pet->location    = $request->location;
            $pet->description = $request->description;
            $pet->image       = $image;

            if ($pet->save()) {
                return redirect('pets')->with('message', 'The Pet: ' . $pet->name . ' was added successfully.');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        return view('pets.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        $validation = $request->validate([
            'name'        => ['required', 'string'],
            'kind'        => ['required', 'string'],
            'breed'       => ['required', 'string'],
            'age'         => ['required', 'integer'],
            'weight'      => ['required', 'numeric'],
            'location'    => ['required', 'string'],
            'description' => ['nullable', 'string'],
        ]);

        if ($validation) {
            if ($request->hasFile('image')) {
                $image = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $image);
                if ($request->originimage != 'no-image.png' && file_exists(public_path('images/' . $pet->image))) {
                    unlink(public_path('images/' . $pet->image));
                }
            } else {
                $image = $request->originimage;
            }

            $pet->name        = $request->name;
            $pet->kind        = $request->kind;
            $pet->breed       = $request->breed;
            $pet->age         = $request->age;
            $pet->weight      = $request->weight;
            $pet->location    = $request->location;
            $pet->description = $request->description;
            $pet->image       = $image;

            if ($pet->save()) {
                return redirect('pets')->with('message', 'The Pet: ' . $pet->name . ' was edited successfully.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        if ($pet->image != 'no-image.png' && file_exists(public_path('images/' . $pet->image))) {
            unlink(public_path('images/' . $pet->image));
        }
        if ($pet->delete()) {
            return redirect('pets')->with('message', 'The Pet: ' . $pet->name . ' was deleted successfully.');
        }
    }

    public function pdf()
    {
        $pets = Pet::all();
        $pdf = PDF::loadView('pets.pdf', compact('pets'));
        return $pdf->download('allpets.pdf');
    }

    public function excel()
    {
        return Excel::download(new PetsExport, 'allpets.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PetsImport, $file);
        return redirect()->back()->with('message', 'Pets imported successfully!');
    }

    public function search(Request $request)
    {
        $pets = Pet::names($request->q)->orderBy('id', 'desc')->paginate(12);
        return view('pets.search')->with('pets', $pets);
    }
}