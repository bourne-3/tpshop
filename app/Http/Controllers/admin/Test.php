<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Test extends Controller
{
    //
    public function test()
    {
        return view('test', ['name' => 'bourne', 'level' => 10, 'tasks' => ['u1', 'u2', 'selwyn']]);
    }
}
