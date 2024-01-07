<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index()
    {
        $departements = Departement::all();

        return view('pages.departement.index', [
            'title' => 'Kategori',
            'departements' => $departements,
        ]);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Departement::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
