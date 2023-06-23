<?php

namespace App\Controllers;

class UserController extends BaseController
{

    public function __construct()
    {
        helper('session');

        // Verifica se a sessão expirou
        if (!session()->get("LoggedUserData")) {
            session()->setFlashData("Error", "Your session has expired. Please login again.");
            return redirect()->to(base_url().'/login');
        }
    }
    public function index()
    {
        $data['pageTitle']= "Início";
        return view('dashboard/home',$data); 
    }

    public function profile()
    {
        if (!session()->get("LoggedUserData")) {
            session()->setFlashData("Error", "Your session has expired. Please login again.");
            return redirect()->to(base_url());
        }
        
        $data['pageTitle']= "Profile";
        return view('dashboard/profile',$data);
    }


}

