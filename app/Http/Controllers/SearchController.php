<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    /**
    *一覧画面表示
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
            -> orWhere('detail', 'LIKE', "%{$keyword}%");
        }

    

        $items = $query->get();

        return view('search.search', compact('items', 'keyword'));

    }


    /**
     * 詳細画面の表示
     */
    public function detail($id){
        $item = Item::find($id);

        return view('search.detail', compact('item'));
    }

}
