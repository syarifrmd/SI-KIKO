<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class RedirectIfAuthenticatedForRegister
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure  $next
//      * @return mixed
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         if (Auth::check()) {
//             // Redirect jika pengguna sudah login
//             return redirect()->route('login'); // Ubah 'home' ke rute tujuan Anda
//         }

//         return $next($request); // Lanjutkan ke request berikutnya
//     }
// }