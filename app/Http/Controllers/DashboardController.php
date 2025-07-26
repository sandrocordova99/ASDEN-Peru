<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct(); // 👈 (Esto es opcional, pero evita problemas en algunos casos)
        $this->middleware('auth:sanctum'); 
        $this->middleware('admin');
    }

    public function index()
    {
        return view('homeDashboard');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function listUsers()
    {
        return view('auth.listuser');
    }
}
