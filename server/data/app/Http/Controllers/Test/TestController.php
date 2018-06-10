<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class TestController extends Controller
{

    public function __construct()
    {
        $key = "a126dFXc7D4d1vcE";
        $payload = array("info"=>'hello!!');
        $token = App::make("LoginToken");
        $token:take($payload,$key);
    }
}
