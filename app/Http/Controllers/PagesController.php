<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class PagesController extends Controller
{
    public function index(){
        return Inertia::render('Site/Home');
    }
}
