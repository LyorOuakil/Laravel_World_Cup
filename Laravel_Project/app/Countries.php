<?php
namespace App;
use App;
use Illuminate\Database\Eloquent\Model;
use DB;

class Countries extends Model
{
    protected $table = "countries";


    public static function getInfoById($id)
    {
        $info = DB::table('countries')->where('id', $id)->get();
        return $info; 
    }
}

