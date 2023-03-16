<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\User;

class ItemController extends Controller
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
     * 商品一覧
     */
    public function index()
    {


        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'quantity' => $request->quantity,
                'detail' => $request->detail,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }
    //編集画面表示

    public function edit(Item $item,Request $request)
    {
        $item = Item::where('id','=',$request->id)->first();

        return view('item.edit',compact('item'))
        ->with([
            'item' => $item,
        ]);
    }


    public function itemEdit(Item $item,Request $request)
    {
        $detail=isset($request->detail)?$request->detail:'';
        //データ更新
        $item->update([
            'name' => $request->name,
            'status' => $request->status,
            'type' => $request->type,
            'quantity'=> $request->quantity,
            'detail' => $detail,
        ]);

        //商品一覧画面に戻る
        return redirect()->route('item.index',['id'=>$item->id]);
        }

/**
     * 備品削除
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $item = Item::where('id','=',$request->id)->first();
        $item -> delete();
        //
        //在庫一覧画面に戻る
        return redirect('/index');
    }


//注文画面表示

public function order(Request $request)
    {
        
        return view('item.order');
    }
    
}
