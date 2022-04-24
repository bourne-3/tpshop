<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ManagerModel extends Model
{
    use HasFactory;

    const T_MANGER_INFO = 'tpshop_manager';

    public static function retriveAllManager()
    {
        $ret = DB::table(self::T_MANGER_INFO)
            // 不可以等于 'null'  应该是null
            ->where(['delete_time' => null])
            ->get();
        return $ret;
    }

    public static function updateManager($params)
    {
        DB::table(self::T_MANGER_INFO)
            ->where(['id' => $params['id']])
            ->update($params);
    }

    public static function updateByField($update, $where)
    {
        DB::table(self::T_MANGER_INFO)
            ->where($where)
            ->update($update);
    }

    public static function deleteManager($id)
    {
        $update['delete_time'] = date('Y-m-d H:i:s');
        $where['id'] = $id;
        self::updateByField($update, $where);
    }

    public static function getOneManager($params)
    {
        $ret = DB::table(self::T_MANGER_INFO)
            ->where('username', '=', $params['username'] ,'and')
            ->where('password', '=', $params['password'])
            ->get();
        return $ret;
    }

    public static function getManagerByField($filed, $select=['*'])
    {
        $ret = DB::table(self::T_MANGER_INFO)
            ->select($select)
            ->where($filed)
            ->get();
        return $ret;
    }

    public static function addManager($params)
    {
        $params['password'] = md5(md5($params['password']));
        $params['create_time'] =  date('Y-m-d H:i:s');
        DB::table(self::T_MANGER_INFO)
            ->insert($params);
    }



}
