<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Livraison;

class LivraisonController extends Controller
{
    public function index()
    {
        return view('admin.livraison');
    }

    public function destroy($id)
    {
        Livraison::findOrFail($id)->delete();
        return redirect()->route('admin.livraison')->with('message', 'Livraison supprimée avec succès');
    }
}








 