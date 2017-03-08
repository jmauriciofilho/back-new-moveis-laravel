<?php

namespace App\Domain\Roles;

use Zizaco\Entrust\EntrustRole;

class Roles extends EntrustRole
{
    protected $fillable = ['name', 'display_name', 'description'];
}