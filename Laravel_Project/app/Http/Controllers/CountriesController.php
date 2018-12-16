<?php
namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Countries;
use DB;

class CountriesController extends Controller
{
    public function getCountries(){
        $countries = DB::table('countries')->get();
        if(auth()->user()->status == 2)
        {
            return view('admin/admin', compact('countries'));
        }
        return view('User/teams', compact('countries'));
    }

    public function createTeam(Request $request){
         $this->validate($request, [
             'name' => 'required',
         ]);

        $country = new Countries;
        $country->pays= $request->input('name');
        $country->flag = $request->input('flag');
        $country->cote = $request->input('cote');
        $country->timestamps = false;
        $country->save();
        return redirect('teams');
    }

    public function index()
    {
        return view('Teams/teams_createteam');
    }

    public function edit($id)
    {
        $country = Countries::getInfoById($id);
        return view('admin/Countries/editCountry', compact('country'));
    }


    public function update(Request $request, $id)
    {
        $country = Countries::find($id);
        $country->pays = $request->input('pays');
        $country->flag = $request->input('flag');
        $country->cote = $request->input('cote');
        $country->save();
        return redirect('admin');
    }

    public function destroy($id)
    {
        if(Countries::find($id)){
            $country = Countries::find($id);
            $country->delete();
            // Notification::container()->success('Your account has been permanently removed from the system. Sorry to see you go!');
            return redirect('teams');
        } else {
            return redirect('admin');
        }
    }

    public function getRank(){
        $countries = DB::table('countries')->orderBy('wins', 'desc')->get();

        if(auth()->user()->status == 2)
        {
            return view('Teams/rank', compact('countries'));
        }
        return view('Teams/rank', compact('countries'));
    }
}
