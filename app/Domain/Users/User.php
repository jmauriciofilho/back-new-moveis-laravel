<?php

namespace App\Domain\Users;

use App\Domain\Roles\Roles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'media_id',
        'activated'
    ];

    protected $hidden = [
        'password',
    ];

    public function getDisplayNameRoles()
    {
        $roles = $this->roles()->pluck('display_name');

        if ($roles->count() < 1) {
            return 'Nenhuma.';
        }

        return implode(', ', $roles->toArray()) . '.';
    }

    public function avatar()
    {
        return $this->belongsTo('media_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_user', 'user_id', 'role_id');
    }
}
