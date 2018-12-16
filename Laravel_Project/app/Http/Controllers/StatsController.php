<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Stat;
use DB;

class StatsController extends Controller
{
    public function showStat($id){


        $stats =DB::table('stats')
                        ->join('players', 'stats.players_id', '=', 'players.id')
                        ->join('countries', 'players.countries_id', '=', 'countries.id')
                        ->select('stats.*', 'players.first_name', 'countries.pays', 'countries.id')
                        ->where('players.id', $id)
                        ->get();



        if(auth()->user()->status == 2)
        {
            return view('players/showsingleplayer', compact('stats'));
        }
        return view('Players/showsingleplayer', compact('stats'));
    }
}
