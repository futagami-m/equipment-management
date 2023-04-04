<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     *///ソース機能
    use Sortable;

    protected $fillable = [
        'name',
        'order_quantity',
        'type',
        'status',
        'supplier',
        'deadline',
        'order_name',
        'ordered_name',
        'updated_at'
    ];
    public $sortable = ['deadline','created_at'];


    const TYPE = [
        1 => [ 'label' => '文房具'],
        2 => [ 'label' => '筆記用具'],
        3 => [ 'label' => 'ノート類'],
        4 => [ 'label' => 'ファイリング'],
        5 => [ 'label' => 'その他'],
    ];

    public function getTypeLabelAttribute()
    {
        // 状態値
        $type = $this->attributes['type'];

        // 定義されていなければ空を返す
        if (!isset(self::TYPE[$type])) {
            return '';
        }

        return self::TYPE[$type]['label'];
    }
    // DBのtypeを変換
    public function typeAsString(){
        $types = ["1"=>"文房具","2"=>"筆記用具","3"=>"ノート類","4"=>"ファイリング","5"=>"その他"];

        return $types[$this->type];

    }

}
