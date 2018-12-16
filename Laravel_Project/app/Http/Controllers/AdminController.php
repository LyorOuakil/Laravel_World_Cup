<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Users;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        if(auth()->user()->isAdmin())
        {
            return view('admin');
        }
        else
        {
            return view('home');
        }
    }

    public function getUsers()
    {
        if(auth()->user()->status == 1)
        {
            return redirect('home');
        }
        $users = DB::table('users')->get();
        return view('Admin/ListUsers', compact('users'));
    }
}