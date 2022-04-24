<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\GoodsModel;
use Illuminate\Http\Request;

class GoodsController extends Controller
{
    //

    public function index(Request $request)
    {
        $keyword = $request->input();
        $list = GoodsModel::getGoodsList($keyword);
        return view('admin.goods_list', ['list' => $list]);
    }

    public function login(Request $request)
    {
        $params = $request->input();

        return view('admin.login');
    }

    public function delete($id)
    {
        if (!is_numeric($id) || !is_int($id) || (int)$id > 0) {
            abort(403, "入参有误，请仔细检查");
        }
        // 软删除和硬删除
        // 软删除直接插入delete_time 就可以了
        $params['id'] = $id;
        $params['delete_time'] = date('Y-m-d H:i:s');
        GoodsModel::updateGoods($params);
        return view('admin.success_jump', [
            'message'=>'删除成功，请您耐心等待！',
            'url' => url('/goods/'),
            'jumpTime'=>3,
        ]);

    }

    public function create()
    {
        return view('admin.goods_add');
    }

    public function uploadPic(Request $request)
    {


        $file = $request->file('logo');

        return $file->store('public');
    }

    public function save(Request $request)
    {
//        $request->file()

//        $request->validate([
//            'title' => 'required|unique:posts|max:255',
//            'author.name' => 'required',
//            'author.description' => 'required',
//        ]);

        $params = $request->input();
        $path = $this->uploadPic($request);
        dump($path);


//        $params['goods_logo'] = '地址';
//        GoodsModel::insertGoods($params);
//        return view('admin.success_jump', [
//            'message'=>'你已经提交申请，请您耐心等待！',
//            'url' => url('/goods/'),
//            'jumpTime'=>3,
//        ]);
    }


    public function edit($id)
    {
        // 需要回显数据
        $good_detail = GoodsModel::getGoodsById($id);
        return view('admin.goods_edit', ['good_detail' => $good_detail]);
    }

    public function update(Request $request)
    {
        $params = $request->input();

//        dump($params);
        GoodsModel::updateGoods($params);
        return view('admin.success_jump', [
            'message'=>'修改参数成功，请您耐心等待！',
            'url' => url('/goods/'),
            'jumpTime'=>3,
        ]);
    }

    public function read($id)
    {
        $goods_detail = GoodsModel::getGoodsById($id);
//        dump($goods_detail);
        return view('admin.goods_detail', ['goods_detail' => $goods_detail]);

    }
}
