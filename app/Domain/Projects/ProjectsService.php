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
        $this->project->where('id', $request->get('id'))->first();
        $this->project->completed = $request->get('completed');
        return $this->project->save();
    }

    public function updateCurrentStep(Request $request)
    {
        $this->project->where('id', $request->get('id'))->first();
        $this->project->completed = $request->get('current_step');
        return $this->project->save();
    }

}