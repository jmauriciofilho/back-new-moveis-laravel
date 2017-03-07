<?php

namespace App\Domain\Projects;

use App\Domain\_Classes\AdminController;
use App\Domain\Steps\Steps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectsController extends AdminController
{
    private $projectsService;

    function __construct(ProjectsService $projectsService)
    {
        $this->projectsService = $projectsService;
    }

    public function store(Request $request)
    {
        return $this->projectsService->store($request);
    }

    public function update(Request $request)
    {
        return $this->projectsService->update($request);
    }

    public function updateCurrentStep(Request $request)
    {
        $this->projectsService->updateCurrentStep($request);
    }

    public function updateCompleted(Request $request)
    {
        return $this->projectsService->updateCompleted($request);
    }

    public function allProjects()
    {
        $projects = Projects::all();

        return json_encode($projects);
    }

    public function projectsSteps()
    {
        $projectsSteps = DB::table('projects_steps')->get();

        return json_encode($projectsSteps);
    }

}
