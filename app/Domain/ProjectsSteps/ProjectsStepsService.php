<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 05/03/17
 * Time: 00:04
 */

namespace App\Domain\ProjectsSteps;


use Illuminate\Http\Request;

class ProjectsStepsService
{
    private $projectsSteps;

    function __construct(ProjectsSteps $projectsSteps)
    {
        $this->projectsSteps = $projectsSteps;
    }

    public function updateComplete(Request $request)
    {
        $projectsSteps = $this->projectsSteps->find($request->get('id'));
        $projectsSteps->complete = $request->get('complete');
        $projectsSteps->save();
    }

}