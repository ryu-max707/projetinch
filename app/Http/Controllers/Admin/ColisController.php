<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Colis;

class ColisController extends Controller
{
    public function index()
    {
        return view('admin.colis');
    }

    public function destroy($id)
    {
        colis::findOrFail($id)->delete();
        return redirect()->route('admin.colis')->with('message', 'colis supprimée avec succès');
    }
}

