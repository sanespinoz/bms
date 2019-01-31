<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table    = 'users';
    protected $fillable = ['name', 'email', 'password', 'rol_id', 'last_login_at'];
    protected $dates    = ['created_at', 'updated_at'];

    protected $hidden = ['password', 'remember_token'];

    protected $dateFormat = 'Y-m-d H:i:s.000';
    public $timestamps    = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    public function rol()
    {
        return $this->belongsTo('App\Rol');
    }

    public function hasRole($role)
    {
        if ($this->user()->rol == $role) {
            return true;
        } else {
            return false;
        }

    }
    public function setPasswordAttribute($valor)
    {
        if (!empty($valor)) {
            $this->attributes['password'] = \Hash::make($valor);
        }
    }

}
