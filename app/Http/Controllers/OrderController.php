<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function postOrder(Request $req){

        $orden = Order::create($req->all());
        return response($orden, 201);

    }
}
