<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Player;
use DB;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPlayers()
    {
        // $player = DB::table('players')->get();
        // dd($player);


        $players = DB::table('countries')
                            ->join('players', 'countries.id', '=', 'players.countries_id')
                            ->select('players.*', 'countries.pays')
                            ->orderBy('players.position', 'desc')
                            ->get();


        if(auth()->user()->status == 2)
        {
            foreach($players as $player)
            {
            }
            return view('Admin/players/players', compact('players'));
        }

        return view('Players/players', compact('players'));
    }


    public function getPlayerById($id)
    {
        $players = DB::table('countries')
                            ->join('players', 'countries.id', '=', 'players.countries_id')
                            ->select('players.*', 'countries.pays')
                            ->where('countries.id', $id)
                            ->orderBy('players.position', 'desc')
                            ->get();

        if(auth()->user()->status == 2)
        {
            return view('players/players', compact('players'));
        }
        return view('Players/players', compact('players'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPlayer(Request $request){

         $this->validate($request, [
             'first_name' => 'required',
             'last_name' => 'required',
             'position' => 'required',
             'country' => 'required,'
         ]);

        $player = new Player;
        $player->first_name = $request->input('first_name');
        $player->last_name = $request->input('last_name');
        $player->position = $request->input('position');
        $player->countries_id = $request->input('countries_id');
        $player->save();
        return redirect('players');
    }

    public function index()
    {
        return view('Players/playersCreate');
    }
    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */

    public function show(Player $id)
    {
        $player = DB::table('countries')
                            ->join('players', 'countries.'. $id.'', '=', 'players.countries_id')
                            ->select('players.*', 'countries.pays')
                            ->get();
        return view('players/{id}', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::getInfoById($id);
        return view('Admin/Players/editPlayer', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        $player->first_name = $request->input('first_name');
        $player->last_name = $request->input('last_name');
        $player->position = $request->input('position');
        $player->countries_id = $request->input('countries_id');
        $player->save();
        return redirect('players');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Player::find($id)){
            $player = Player::find($id);
            $player->delete();
            // Notification::container()->success('Your account has been permanently removed from the system. Sorry to see you go!');
            return redirect('players');
        } else {
            return redirect('players');
        }
    }
}
