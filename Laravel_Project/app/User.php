<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    use Notifiable;
    const ADMIN_STATUS = 2;
    const DEFAULT_STATUS = 1;

    public function isAdmin()
    {
        return $this->status === self::ADMIN_STATUS;
    }

    public static function getInfoById($id)
    {
        $info = DB::table('users')->where('id', $id)->get();
        return $info; 
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
