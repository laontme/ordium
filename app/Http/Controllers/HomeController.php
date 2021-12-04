<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->take(5)->get();

        $completed = Order::where('completed', true)->count() / Order::count()  * 100;
//        dd(Order::where('completed', 1)->get());
        return view('home', compact('orders', "completed"));
    }
}
