<?php

namespace App\Domain\Projects;

use App\Domain\_Classes\AdminController;
use App\Domain\Steps\Steps;
use Illuminate\Http\Request;

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
        return $this->projectsService->updateCurrentStep($request);
    }

    public function updateCompleted(Request $request)
    {
        return $this->projectsService->updateCompleted($request);
    }

    public function delete(Request $request)
    {
        return $this->projectsService->delete($request);
    }

    public function toSeekProject(Request $request)
    {
        return $this->projectsService->toSeekProject($request);
    }

    public function allProjects()
    {
        return $this->projectsService->allProjects();
    }

    public function projectsSteps()
    {
        return $this->projectsService->projectsSteps();
    }

}
