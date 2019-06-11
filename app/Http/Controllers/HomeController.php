<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use Illuminate\Support\Facades\Auth;

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
        // $bill = Bills::all();
        $bill = Bills::where('owner_id', Auth::id())->get();
       // dd($bill->;
        return view('home', compact('bill'));
        
    }


}
