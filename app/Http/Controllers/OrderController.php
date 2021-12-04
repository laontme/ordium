<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderInsert;
use App\Http\Requests\OrderUpdate;
use App\Models\Order;
//use App\Models\User;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request) {
        $orders = Order::with(['issuedBy', 'assignedTo'])->paginate(5);
//        dd($orders);
        return view("orders.index", compact('orders'));
    }

    public function show(Request $request, $id) {
        $order = Order::with(["issuedBy", "assignedTo"])->find($id);

//        dd($order);
        return view("orders.show", compact("order"));
    }

    public function complete(Request $request, $id) {
        $order = Order::find($id);
        $order->completed = true;
        $order->save();
//        Order::find($id)->delete();
        return back($status = 302, $headers = [], $fallback = '/');
    }

    public function delete(Request $request, $id) {
        Order::find($id)->delete();
        return back($status = 302, $headers = [], $fallback = '/');
    }

    public function restore(Request $request, $id) {
        Order::withTrashed()->find($id)->restore();
        return back($status = 302, $headers = [], $fallback = '/');
    }

    public function trash(Request $request) {
        $orders = Order::onlyTrashed()->get();
//        dd($orders);
        return view("orders.trash", compact('orders'));
    }

    public function edit(Request $request, $id) {
        $order = Order::find($id);
        $users = User::get();
//        dd($orders);
        return view("orders.edit", compact('order', 'users'));
    }

    public function update(OrderUpdate $request, $id) {
//        dd($request->validated());
        $order = Order::find($id);
        $order->title = $request->validated()["title"];
        $order->description = $request->validated()["description"];
        $order->assigned_id = $request->validated()["assigned"];
        $order->save();

        return redirect(route("orders.show", ["id" => $id]));
//        $orders = Order::onlyTrashed()->get();
////        dd($orders);
//        return view("orders.trash", compact('orders'));
    }

    public function create(Request $request) {
        $users = User::get();
//        $orders = Order::onlyTrashed()->get();
//        dd($orders);
        return view("orders.create", compact('users'));
    }

    public function insert(OrderInsert $request) {
        $order = Order::onlyTrashed()->get();

        $order = new Order;
        $order->title = $request->validated()["title"];
        $order->description = $request->validated()["description"];
        $order->assigned_id = $request->validated()["assigned"];
        $order->issuer_id = auth()->id();
        $order->save();

        return redirect(route("orders.show", ["id" => $order->id ]));
    }

}
