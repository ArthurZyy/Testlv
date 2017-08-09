<?php

/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/7/19
 * Time: 16:54
 */
namespace App\Services;

use App\Contracts\TestContract;

class TestService implements TestContract
{
    public function callMe($controller){
        dd('Call Me From TestServiceProvider In '.$controller);
    }
}