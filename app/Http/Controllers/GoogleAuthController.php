<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // Création du nouvel utilisateur
                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                // ✅ Attribuer le rôle "client"
                if (!Role::where('name', 'client')->exists()) {
                    Role::create(['name' => 'client']);
                }
                $user->assignRole('client');
            }

            // Authentification
            Auth::login($user);

            // ✅ Vérifie s'il a bien le rôle client
            if ($user->hasRole('client')) {
                return redirect()->route('client.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Accès refusé. Vous n\'êtes pas autorisé à accéder au tableau de bord client.');
            }

        } catch (\Throwable $th) {
            return redirect()->route('login')->with('error', 'Erreur Google OAuth : ' . $th->getMessage());
        }
    }
}
