<?php

namespace App\Domain\Justifications;

use App\Domain\_Classes\AdminController;
use Illuminate\Http\Request;

class JustificationsController extends AdminController
{
    private $justificationsService;

    function __construct(JustificationsService $justificationsService)
    {
        $this->justificationsService = $justificationsService;
    }

    public function store(Request $request)
    {
        return $this->justificationsService->store($request);
    }

    public function update(Request $request)
    {
        return $this->justificationsService->update($request);
    }

    public function allJustifications()
    {
        $justifications = Justifications::all();

        return json_encode($justifications);
    }
}
