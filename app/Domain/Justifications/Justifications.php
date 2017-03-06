<?php

namespace App\Domain\Justifications;

use Illuminate\Database\Eloquent\Model;

class Justifications extends Model
{
    protected $fillable = [
        'user_id',
        'step_id',
        'project_id',
        'date',
        'text',
    ];

    public function user(){
        $this->hasOne('App\Domain\Users\User');
    }

    public function step(){
        $this->hasOne('App\Domain\Steps\Steps');
    }

    public function project(){
        $this->hasOne('App\Domain\Projects\Projects');
    }
}
