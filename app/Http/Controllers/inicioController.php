<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function index()
    {
        return view('inicio');
    }
    
    public function contactenos()
    {
       
    }
    
    public function servicios()
    {
       
    }

    
    
    
   
    
}
