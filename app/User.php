<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'refferal_code','point_reward'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole($has){
        $role = $this->belongsTo('App\Model\RoleUser','id')->first();
        if(empty($role)) return false;
        $slug = $role->belongsTo('App\Model\Roles','role_id')->first();
        if(empty($slug)) return false;
        return ($slug->slug == $has)?true:false;
    }

    public function point()
    {
        return 'App\Model\Reward'::select(DB::raw('SUM(point) as point'))->where('user_id',$this->id)->first();
    }
}
