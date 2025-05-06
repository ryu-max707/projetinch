<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     

 // app/Http/Middleware/AdminMiddleware.php

 public function handle($request, Closure $next)
 {
     if (auth()->check() && auth()->user()->role === 'admin') {
         return $next($request);
     }
 
     abort(403, 'Accès interdit');
 }
}

