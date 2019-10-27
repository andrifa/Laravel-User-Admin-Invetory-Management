<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStatus = Auth::user()->status;
        if ($userStatus=="active") {
            return redirect()->route('inventory.index');
            // $userEmail = Auth::user()->email;
            // $inventories = Inventory::where('email',$userEmail)->paginate(5);
            // $inventories = Inventory::latest()->paginate(5);
            // return view('inventory.index', compact('inventories'))
            //     ->with('i',(request()->input('page',1)-1)*5);
            # code...
        } else {
            return view('home');
            # code...
        }
    }
}
