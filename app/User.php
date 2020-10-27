<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;



    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function authorizedRoles($roles){
      if ($this->hasAnyRole($roles)) {
        return true;
      }
      return false;
    }

    public function hasAnyRole($roles){
      if(is_array($roles)){
        foreach ($roles as $role) {
          if($this->roles()->where('name',$role)->first()){
            $rol = $this->roles()->where('name', $role)->first();
            $role_user = DB::table('role_user')->where('user_id', auth()->user()->id )->where('role_id', $rol->id)->first();
            if ($role_user->status == 'activated') {
              return true;
            }
            return false;
          }
        }
      }else{
        if($this->hasRole($roles)){
          return true;
        }
      }
      return false;
    }


    public function hasRole($role){

      if($this->roles()->where('name',$role )->first()){
        $rol = $this->roles()->where('name', $role)->first();
        $role_user = DB::table('role_user')->where('user_id',auth()->user()->id )->where('role_id', $rol->id)->first();
        if ($role_user->status === 'activated') {
          return true;
        }
        return false;
      }
      return false;
    }

    public function tengoRol($role){
      $rol = $this->roles()->where('name','admin')->first();
      $roles = DB::table('role_user')->get();
      $usuario = auth()->user()->id;
      return $rol;
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
