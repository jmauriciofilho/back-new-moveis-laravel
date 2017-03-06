<?php

namespace App\Domain\ProjectsSteps;

use Illuminate\Database\Eloquent\Model;

class ProjectsSteps extends Model
{
    protected $fillable = [
        'project_id',
        'step_id',
        'complete',
    ];
}
