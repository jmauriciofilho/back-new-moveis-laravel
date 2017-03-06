<?php

namespace App\Http\Controllers;

use App\Domain\ProjectsSteps\ProjetsStepsServices;
use Illuminate\Http\Request;

class ProjetsStepsController extends Controller
{
    private $projetsStepsService;

    function __construct(ProjetsStepsServices $projetsStepsServices)
    {
        $this->projetsStepsService = $projetsStepsServices;
    }

    public function updateComplete(Request $request)
    {
        $this->projetsStepsService->updateComplete($request);
    }
}
