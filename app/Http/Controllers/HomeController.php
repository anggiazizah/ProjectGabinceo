<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $role = $request->user()->userRole?->role?->nama;

        return redirect()->route(
            $role === 'admin' ? 'admin.dashboard' : 'pembeli.dashboard'
        );
    }
}
