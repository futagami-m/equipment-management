<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Item;
use App\Models\Order;


class OrderController extends Controller
{
    public function history(Request $request)
    {
       

        // 注文一覧取得
        $orders = Order::sortable()
        ->where('status', '=', 'active')
        ->orderBy('created_at','desc')
        ->get();

        //セレクトボックス
        $selectType = $request->input('type');
        //検索欄
        $keyword = $request->input('keyword');

        if(!empty($selectType)) {
            $orders->where('type', '=', "$selectType");
        }

        if(!empty($keyword)) {
            $orders->where('supplier', 'LIKE', "%{$keyword}%")
                   ->Where('name', 'LIKE', "%{$keyword}%");
        }
        

        return view('orders.history',compact('keyword'))->with([
            'order' => $orders,
            
        ]);
    }




        //削除する
        public function historyDelete(Request $request){
            $order = Order::where('id','=',$request->id)->first();           
            $order->delete();
            return redirect('orders');
        }



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
            'type' => $request->type,
            'supplier' => $request->supplier,
            'deadline' => $request->deadline,
            'order_name' => $request->order_name,
            'ordered_name' => $request->ordered_name,
            
        ]);

        return redirect('/items');
    }


    //更新画面表示
    public function edit(Request $request)
    {
        // dd($item);
        //更新する注文履歴IDを取得する
        $order = Order::where('id','=',$request->id)->first();
        return view('orders.edit',compact('order'))
        ->with([
            'order' => $order,
        
        ]);
    }

}
