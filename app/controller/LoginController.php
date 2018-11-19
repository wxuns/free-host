<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/11/18
 * Time: 12:02
 */

namespace app\controller;
use core\controller;


class LoginController extends Controller
{
    public function login(){
        $this->display('login.html');
    }
}