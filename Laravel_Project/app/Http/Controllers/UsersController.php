<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin/createUser');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(auth()->user()->status == 1)
        {
            return redirect('home');
        }
        if (!$request->has('isAdmin')) 
        {
            $isAdmin = 1;
        }
        else
            $isAdmin = 2;
         User::create([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'status' => $isAdmin 
        ]);
        return redirect()->route('ListUsers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->status == 1)
        {
            return redirect('home');
        }
        $user = User::getInfoById($id);
        return view('Admin/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->user()->status == 1)
        {
            return redirect('home');
        }

        $user = DB::table('users')->select('email')
                ->where('id', $id)
                ->where('email', $request->input('email'))
                ->first();
        
        if(count($user) === 0)
        {
            $valide = $request->validate([
                'email' => 'unique:users'
            ]);
        }
        
        $name = $request->input('name');
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->credits = $request->input('credits');
        $user->save();
        return redirect()->route('ListUsers');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->status == 1)
        {
            return redirect('home');
        }
        if(User::find($id)){
            $user = User::find($id);
            $user->delete();
            // Notification::container()->success('Your account has been permanently removed from the system. Sorry to see you go!');
            return redirect()->route('ListUsers');
        } else {
            return redirect()->route('ListUsers');
        }
    }
}
