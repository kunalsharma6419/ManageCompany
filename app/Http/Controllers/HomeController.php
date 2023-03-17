<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function redirect()
    {

        if(Auth::id())
        {
              if(Auth::user()->role=='user')
              {
                 return view('home');
              }
              else
              {
                  return view('admin.dashboard');
              }
        }

        else
        {
            return redirect()->back();
        }
    }
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
        return view('home');
    }
}
