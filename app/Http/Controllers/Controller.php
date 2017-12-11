<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct() //mỗi khi run any Controller bất kỳ đều gọi Controller này, -> call function construt -> call function dangnhap
    {
      $this->dangnhap();
    }

    function dangnhap()  //ktra đang đăng nhập or not
    {
      if (Auth::check()) {  //check nếu đang login
        view()->share('user_login',Auth::user());    //truyền biến user_login chứa data user theo dạng viewshare để all view đều get đc, auth truyền sang biến user
      }  
    }
}
