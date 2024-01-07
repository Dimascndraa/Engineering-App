<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementApiController extends Controller
{
    public function getDepartement()
    {
        $departements = Departement::all();
        return dd($departements);
        return response()->json($departements);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:departements',
            'slug' => 'required|unique:departements',
            'status' => 'required',
        ]);

        $departement = Departement::create($validatedData);

        return response()->json(['message' => 'Departemen berhasil ditambahkan', 'de$departement' => $departement]);
    }

    public function show(Departement $departement)
    {
        return response()->json($departement);
    }

    public function update(Request $request, Departement $departement)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'code' => 'required|unique:departements,code,' . $departement->id,
            'slug' => 'required|unique:departements,slug,' . $departement->id,
            'status' => 'required',
        ]);

        $departement->update($validatedData);

        return response()->json(['message' => 'Departement updated successfully']);
    }
}
