<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public  function login()
    {
        return view('auth.login');
    }

    public  function dashboard()
    {
        $data['tasks'] = Task::all();
       return view('Back.DashBoard.index', $data);

    }
}
