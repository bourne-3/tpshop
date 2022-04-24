<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GoodsModel extends Model
{
    use HasFactory;
    const T_GOODS = 'tpshop_goods';

    public static function getGoodsList($keyword)
    {
        $where = [];
        if (!empty($keyword['keyword'])) $where[] = ['goods_name', 'like', '%' . $keyword['keyword'] . '%'];
        $where[] = ['delete_time', '=', null];
        $ret = DB::table(self::T_GOODS)
            ->where($where)
            ->get();
        return $ret;
    }



    public static function updateGoods($params, $filed=[])
    {
//        request()->validate([
//            'goods_id' => 'required',
//            'goods_name' => 'required'
//        ]);

        $dataFiltered = self::filterData($params, ['goods_name', 'goods_price', 'goods_number', 'goods_introduce', 'id', 'delete_time']);
        $filed['id'] = $dataFiltered['id'];

        DB::table(self::T_GOODS)
            ->where($filed)
            ->update($dataFiltered);
    }



    public static function getGoodsById($id)
    {
        $ret = DB::table(self::T_GOODS)
//            ->find($id)
            ->where(['id' => $id])
            ->get();
        return $ret;
    }

    public static function insertGoods($params)
    {
        $insertData = self::filterData($params, ['goods_name', 'goods_price', 'goods_number', 'goods_introduce']);
        $insertData['create_time'] =  date('Y-m-d H:i:s');
//        dump($insertData);
        DB::table(self::T_GOODS)
            ->insert($insertData);
    }

    public static function filterData($params, $field)
    {
        $insertData = [];
        foreach ($field as $item) {
            if (!empty($params[$item])) $insertData[$item] = $params[$item];
        }
        return $insertData;
    }
}
