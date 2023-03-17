<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class SearchController extends Controller
{





    /**
    *在庫一覧画面表示
     */
    public function index(Request $request){
        //ステータスがactiveだけを取得
        $query = Item::where('status', '=', 'active')->orderByDesc("updated_at");

        //セレクトボックス
        $selectType = $request->input('type');
        //検索欄
        $keyword = $request->input('keyword');

        if(!empty($selectType)) {
            $query->where('type', '=', "$selectType");
        }

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
            -> orWhere('detail', 'LIKE', "%{$keyword}%")
            -> orWhere('updated_name', 'LIKE', "%{$keyword}%");
        }

    

        $items = $query->get();

        return view('item.index', compact('items', 'keyword'))->with([
            
            
        ]);

    }


    /**
     * 詳細画面の表示
     */
    public function detail($id){
        $item = Item::find($id);

        return view('search.detail', compact('item'));
    }



/**
    *注文履歴画面表示
     */
    public function history(Request $request){
        //ステータスがactiveだけを取得
        $query = Item::where('status', '=', 'active')->orderByDesc("updated_at");

        //セレクトボックス
        $selectType = $request->input('type');
        //検索欄
        $keyword = $request->input('keyword');

        if(!empty($selectType)) {
            $query->where('type', '=', "$selectType");
        }

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
            -> orWhere('detail', 'LIKE', "%{$keyword}%");
        }

    

        $items = $query->get();

        return view('item.index', compact('items', 'keyword'))->with([
            
            
        ]);

    }


}

