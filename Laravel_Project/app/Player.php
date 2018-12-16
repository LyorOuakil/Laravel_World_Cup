<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Player extends Model
{
    protected $table = "players";

    public static function getInfoById($id)
    {
        $info = DB::table('players')->where('id', $id)->get();
        return $info; 
    }
}
