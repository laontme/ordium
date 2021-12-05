<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function assigned(Request $request) {
        $orders = User::find(auth()->id())->assignments()->with(['assignments', 'emissions'])->get();
        return view('users.assigned', compact('orders'));
    }

    public function issued(Request $request) {
        $orders = User::find(auth()->id())->emissions()->with(['assignments', 'emissions'])->get();
        return view('users.assigned', compact('orders'));
    }
}
