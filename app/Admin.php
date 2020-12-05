<?php

namespace App;

use App\Notifications\AdminPasswordResetNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;


class Admin extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;


    protected $guard = 'admin';

    public function getNameAttribute($value)
    {

        return ucfirst($value);

    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminPasswordResetNotification($token));
    }

    protected $fillable = [
        'name', 'email', 'password', 'phone','avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function scopeWhereRoleNot($query, $role_name)
    {

        return $query->whereHas('roles', function ($q) use ($role_name) {
            return $q->whereNotIn('name', (array)$role_name)
                ->WhereNotIn('id', (array)$role_name);
        });


    }

}
