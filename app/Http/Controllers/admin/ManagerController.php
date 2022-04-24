<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ManagerModel;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //

    public function index()
    {
        $managerList = ManagerModel::retriveAllManager();
        $mapper = [0 => '不可用', 1 => '可用'];
        return view('admin.manager_list', ['manager_list' => $managerList, 'mapper' => $mapper]);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('manager_info');
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $params = $request->input();
        if ($request->isMethod('post')) {
            unset($params['_token']);
            $params['password'] = md5(md5($params['password']));
            // 校验
            $request->validate([
                'username' => 'required',
                'password' => 'required',
                'verify' => 'required|captcha'
            ]);
            // 查用户
            $manager = ManagerModel::getOneManager($params);
            if (!empty($manager->first())) {
                $request->session()->put('manager_info', $manager->first());
                return redirect('/goods');
            } else {
                abort(403, '输入的密码错误');
            }
        } else {
            return view('admin.login');
        }

    }

    public function create()
    {
        return view('admin.manager_add');
    }

    public function save(Request $request)
    {
        $params = $request->input();
        unset($params['_token']);

        $request->validate([
            'username' => 'required',
            'nickname' => 'required',
            'password' => 'required',
            'email' => 'required',
        ]);

        ManagerModel::addManager($params);

        return view('admin.success_jump', [
            'message'=>'你已经提交申请，请您耐心等待！',
            'url' => url('/manager/'),
            'jumpTime'=>3,
        ]);
    }

    public function edit($id)
    {
        // 校验参数
        // validate 跳到指定的页面进行统一处理比较好？
        // 或者try catch捕获异常来抛出

        // 回显
        $manager_detail = ManagerModel::getManagerByField(['id' => $id]);

        // 真正保存
//        dump($manager_detail);
        return view('admin.manager_edit', ['manager_detail' => $manager_detail]);
    }

    public function update(Request $request)
    {
        $params = $request->input();
        unset($params['_token']);
        try {
            $request->validate([
                'id' => 'required',
                'username' => 'required',
                'nickname' => 'required',
                'email' => 'required',
            ]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        ManagerModel::updateByField($params, ['id' => $params['id']]);
        return view('admin.success_jump', [
            'message'=>'修改成功，请您耐心等待！',
            'url' =>'/manager/',
            'jumpTime'=>3,
        ]);
    }

    public function delete(Request $request, $id)
    {
//        try {
//            $request->validate([
//                'id' => 'required|int',
//            ]);
//        } catch (\Exception $e) {
//            echo $e->getMessage();
//        }

        ManagerModel::deleteManager($id);
        return view('admin.success_jump', [
            'message'=>'删除成功，请您耐心等待！',
            'url' =>'/manager/',
            'jumpTime'=>3,
        ]);
    }
}
