<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function index()
    {
        $data['pageTitle']= "Início";
        return view('dashboard/home',$data); 
    }

    public function profile()
    {
        $data['pageTitle']= "Profile";
        return view('dashboard/profile',$data);
    }


}

