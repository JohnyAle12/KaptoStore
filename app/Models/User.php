<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmail as NotiVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    public $user;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account', 'active_role', 'document_id', 'name', 'lastname', 'mobile', 'email', 'email_verified_at', 'password', 'city', 'address', 'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the route key for the model.
     * @return string
    */
    public function getRouteKeyName()
    {
        return 'account';
    }

    // Envio de notificacion de email, confirmacion de email
    public function sendEmailVerificationNotification()
    {
        $this->notify(new NotiVerifyEmail());
    }

    // Envio de notificacion reset password
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    // Relacion al modelo roles por medio de tabla pivote
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role')->using('App\Models\RoleUser');
    }

    // Relacion al modelo request
    public function requests()
    {
        return $this->belongsToMany('App\Models\Request');
    }

    // Logica de autorizacion de roles
    public function autorizeRoles($roles)
    {
        if($this->hasAnyRoles($roles)){
            return true;
        }
        return false;
    }

    public function hasAnyRoles($roles)
    {
        if(is_array($roles)){
            foreach ($roles as $role){
                if($this->hasRole($role)){
                    return true;
                }
            }
        }else{
            if($this->hasRole($roles)){
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        $hasRole = RoleUser::join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('roles.name', $role)
            ->where('role_user.user_id', auth()->user()->id)
            ->first();
        if($hasRole){
            return true;
        }
        return false;
    }

}






