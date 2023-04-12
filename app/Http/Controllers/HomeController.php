<?php

namespace App\Http\Controllers;

use App\Models\Check;
use App\Services\CheckService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //

    public function getChecks(CheckService $checkService) {
        $checks = $checkService->getLastQuarterChecks();
        $insert = [];

        foreach($checks as $key => $check){
            $insert[$key]['ref_key'] = $check['Ref_Key'];
            $insert[$key]['object'] = $check['Объект'];
            $insert[$key]['cash'] = $check['Сумма'];
            $insert[$key]['noncash'] = $check['Сумма'];
            $insert[$key]['date'] = $check['Date'];
        }

        Check::insert($insert);

        echo 'done';
    }
}
