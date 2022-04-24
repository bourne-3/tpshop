<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    //

    public function test1()
    {
        $message = 'custom message log ';
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);

        return ['ok'];
    }

    public function test3(Request $request)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://www.devdo.net',
            // You can set any number of default request options.
        ]);

        $response = $client->request('GET', '');
        return $response;

    }

    public function test4(Request $request)
    {
        $params = $request->input();
        $type = $params['type'];
        $https = $params['https'];

        $ch = curl_init("http://www.devdo.net");

        if ($type) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        if ($https) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        curl_close($ch);
        dump($res);
        return $res;
    }


}
