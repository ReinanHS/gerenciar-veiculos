<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{
    public function index(){
        return Inertia::render('Site/Home');
    }

    public function recursos(){
        return Inertia::render('Site/Recursos');
    }

    public function precos(){
        return Inertia::render('Site/Precos');
    }

    public function clientes(){
        $clientes = Cache::remember('veiculos', 60 * 60, function () {
            return User::select(['name', 'email'])->take(4)->get();
        });

        return Inertia::render('Site/Clientes', [
            'clientes' => $clientes,
        ]);
    }
}
