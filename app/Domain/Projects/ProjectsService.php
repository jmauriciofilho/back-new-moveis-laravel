<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 31/01/17
 * Time: 23:54
 */

namespace App\Domain\Projects;

use App\Domain\Steps\Steps;
use Illuminate\Http\Request;
class ProjectsService
{
    private $project;

    function __construct(Projects $project)
    {
        $this->project = $project;
    }

    public function store(Request $request)
    {
        $steps = Steps::all()->toArray();

        $this->project->steps()->sync($steps);

        return $this->project->create($request->all());
    }

    public function update(Request $request)
    {
        return $this->project->update($request->all());
    }

    public function updateCompleted(Request $request)
    {
        $project = $this->project->find($request->get('id'));
        $project->completed = $request->get('completed');
        $project->save();
    }

    public function updateCurretStep(Request $request)
    {
        $project = $this->project->find($request->get('id'));
        $project->current_step = $request->get('current_step');
        $project->save();
    }

}