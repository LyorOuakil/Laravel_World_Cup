<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Match;
use DB;

class MatchController extends Controller
{
    public function getMatchs(){
        $matchs = DB::table('matchs')
        ->select('matchs.*')
        ->get();
        if(auth()->user()->status == 2)
        {
            return view('Match/match', compact('matchs'));
        }
        return view('User/match', compact('matchs'));
    }

    public function createMatch(Request $request){

        if(auth()->user()->status == 1)
        {
            return back();
        }
         $this->validate($request, [
             'team_1' => 'required',
             'team_2' => 'required',
             'score_1' => 'required',
             'score_2' => 'required',
             'winner' => 'required',

         ]);

        $matchs = new Match;
        $matchs->team_1 = $request->input('team_1');
        $matchs->team_2 = $request->input('team_2');
        $matchs->score_1 = $request->input('score_1');
        $matchs->score_2 = $request->input('score_2');
        $matchs->winner = $request->input('winner');
        $matchs->state = $request->input('state');


        $urlContents = $this->curl("http://api.openweathermap.org/data/2.5/weather?q=".$request->input('weather')."&type=accurate&appid=8534e1cf2a733d5fc2ca962debffcfc1");
            $weatherArray = json_decode($urlContents, true);

            $weather = $request->input('weather')." : ".$weatherArray['weather'][0]['description'].".";
            $tempInFahrenheit = intval($weatherArray['main']['temp']* 9/5 - 459.67);
            $tempInCelcius=  (($tempInFahrenheit- 32) / 1.8);
            $tempInCelcius = floor($tempInCelcius);
            $speedInMPH = intval($weatherArray['wind']['speed']*2.24);

            $weather .=" Temp : ".$tempInCelcius."deg C°.";

        $matchs->weather = $weather;
        $matchs->save();

        return back()->with(compact('matchs'));
    }

    public function curl($url) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function index()
    {
        if(auth()->user()->status == 1)
        {
            return redirect('home');
        }
        return view('Match/creatematch');
    }
}
