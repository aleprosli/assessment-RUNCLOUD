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
    public function index()
    {
        $deadline_tasks = auth()->user()->tasks()->where('status',false)->get();

        $workspaces = auth()->user()->workspaces;

        return view('home', compact('workspaces', 'deadline_tasks'));
    }
}
