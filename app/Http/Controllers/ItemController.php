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
            ::sortable()->where('items.status', 'active')
            ->select()
            ->get();
        $user =  Auth::user();

        return view('item.index', compact('items'))->with([
            'user' => $user,
            
        ]);
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
                'name' => 'required|unique:items|max:100',
                'quantity' => 'required',
                'detail' => 'max:500',
                
            
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
        // dd($item);
        //ログインしたユーザー名を設定する
        $user = Auth::user();
        return view('item.edit',compact('item'))
        ->with([
            'item' => $item,
            'user' => $user,
        ]);
    }


    public function itemEdit(Request $request)
    { 
         // バリデーション
         $this->validate($request, [
            'name' => 'required|max:100',
            'quantity' => 'required',
            'detail' => 'required|max:500',]);
        

        $item = Item::where('id','=',$request->id)->first();
        $detail=isset($request->detail)?$request->detail:'';
        //データ更新
        $item->update([
            'name' => $request->name,
            'status' => $request->status,
            'type' => $request->type,
            'quantity'=> $request->quantity,
            'detail' => $detail,
            'updated_name' => $request->updated_name,
        ]);

        //商品一覧画面に戻る
        return redirect('/items');
        }

/**
     * 備品削除
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request ,$id)
    {
        $item = Item::where('id','=',$id)->first();
        $item -> delete();
        //
        //在庫一覧画面に戻る
        return redirect('/items');
    }

    
}
