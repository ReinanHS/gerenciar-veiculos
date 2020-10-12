<?php

namespace App\Http\Controllers;

use App\User;
use Inertia\Inertia;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\StatusHistory;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $veiculos = Cache::remember('veiculos', 60 * 2, function () {
            return Vehicle::count();
        });

        $observacoes = Cache::remember('observacoes', 60 * 2, function () {
            return StatusHistory::count();
        });

        $users = Cache::remember('users', 60 * 2, function () {
            return User::count();
        });

        return Inertia::render('Dashboard/Home', [
            'veiculos' => $veiculos,
            'observacoes' => $observacoes,
            'users' => $users,
        ]);
    }
}
