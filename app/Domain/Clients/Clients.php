<?php

namespace App\Domain\Clients;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'cpf',
        'email',
        'phone',
    ];

}
