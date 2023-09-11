<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $pageName = "FISKOM Library System Dashboard";
        $navbarType = "navbar_filled";
        $menu = "dashboard.dashboard_menu";
        return view('dashboard.dashboard', ['pageName' => $pageName, 'navbarType'=>$navbarType, 'menu' => $menu]);
    }
}
