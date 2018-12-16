<?php

namespace App\Http\Controllers;
use App\User;
use App\Match;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class BetController extends Controller
{
    public function index()
    {
        $matchs = DB::table('matchs')->where('state', '=',  'upcoming')->get();
        return view('User/Bet', compact('matchs'));
    }

    public function SelectBet($id)
    {
            $matchs = DB::table('matchs')->where('state', '=',  'upcoming')->get();
            return view('User/bet', compact('matchs'));
    }

    public function Bet(Request $request, $id)
    {
        $userCredits = (Auth()->user()->credits);
        $userCredits -= $request->input('credits');

       $match = DB::table('users')->where('id', $id)
                                  ->update(['credits' => $userCredits]);

        return back();
    }
}
