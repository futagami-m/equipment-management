<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Order;

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
        $items= Item::where('quantity','<','10')->orderBy('updated_at','desc')->get();
        $user = Auth::user();
        $order= Order::orderBy('created_at','desc')->get();
        
        return view('home',compact("items","user","order"));

        
    }
}
