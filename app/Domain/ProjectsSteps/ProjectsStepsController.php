<?php

namespace App\Domain\ProjectsSteps;

use App\Domain\ProjectsSteps\ProjectsStepsService;
use App\Domain\_Classes\AdminController;
use Illuminate\Http\Request;

class ProjectsStepsController extends AdminController
{
    private $projectsStepsService;

    function __construct(ProjectsStepsService $projectsStepsService)
    {
        $this->projectsStepsService = $projectsStepsService;
    }

    public function updateComplete(Request $request)
    {
        return $this->projectsStepsService->updateComplete($request);
    }
}
