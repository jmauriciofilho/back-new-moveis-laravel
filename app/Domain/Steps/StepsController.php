<?php

namespace App\Domain\Steps;

use App\Domain\_Classes\AdminController;
use Illuminate\Http\Request;

class StepsController extends AdminController
{
    private $stepsService;

    function __construct(StepsService $stepsService)
    {
        $this->stepsService = $stepsService;
    }

    public function allSteps()
    {
        $steps = Steps::all();

        return json_encode($steps);
    }

    public function updateDays(Request $request)
    {
        $this->stepsService->updateDays($request);
    }
}
