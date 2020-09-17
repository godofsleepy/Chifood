<?php

namespace App\Http\Controllers;

use App\Food;
use App\Order;
use App\DetailOrder;
use App\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $foods = Food::all();
        return view('pages.cashier', compact('foods'));
    }

    public function store(Request $request)
    {
        //
        $order = new Order();
        $order->id_user = "1";
        $order->no_table = "-";
        $order->description = "-";
        $order->status_order = "-";
        $order->save();
        $idOrder = $order->id_order;

        $foods = $request->order;
        $data = array();
        foreach ($foods as $food) {
            $data[] = [
                'id_food' => $food['id'],
                'quantity' => $food['qty'],
                'price' => $food['price'],
                'status' => "-",
                'description' => "-",
                'id_order' => $idOrder
            ];
            DetailOrder::insert($data);
        }

        Transaction::create([
            'id_user' => "1",
            'id_order' => $idOrder,
            'date' => now(),
            'total_price' => $request->totalprice
        ]);

        
    }
}
