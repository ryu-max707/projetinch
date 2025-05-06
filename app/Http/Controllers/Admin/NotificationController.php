<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Notification;
use App\Models\Colis;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function notifications(Request $request)
{
    $query = Colis::query();

    if ($request->filled('status')) {
        $query->where('statut', $request->status);
    }

    if ($request->filled('date_envoi')) {
        $query->whereDate('date_envoi', $request->date_envoi);
    }

    if ($request->filled('search')) {
        $query->where('numero_suivi', 'like', '%' . $request->search . '%');
    }

    $colis = $query->orderByDesc('date_statut')->paginate(5);

    return view('admin.notifications', compact('colis'));
}
}