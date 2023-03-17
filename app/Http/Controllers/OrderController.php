<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\Order;

class OrderController extends Controller
{
    //注文画面表示

    public function order(Request $request,$id)
    {   $user = Auth::user();
        $item = Item::where('id','=',$id)->first();
        return view('orders.order')->with([
            'item' => $item,
            'user' => $user,
            
        ]);
    }
    //注文追加
    public function itemOrder(Request $request){
        // 注文する（登録）
        Order::create([
            'name' => $request->name,
            'order_quantity' => $request->order_quantity,
            'supplier' => $request->supplier,
            'deadline' => $request->deadline,
            'order_name' => $request->order_name,
            'ordered_name' => $request->ordered_name,
            
        ]);

        return redirect('/items');
    }



}
