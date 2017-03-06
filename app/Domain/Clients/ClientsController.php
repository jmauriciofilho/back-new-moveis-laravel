<?php

namespace App\Domain\Clients;

use App\Domain\_Classes\AdminController;
use Illuminate\Http\Request;

class ClientsController extends AdminController
{
    private $clientsService;

    function __construct(ClientsService $clientsService)
    {
        $this->clientsService = $clientsService;
    }

    public function store(Request $request)
    {
        return $this->clientsService->store($request);
    }

    public function update(Request $request)
    {
        return $this->clientsService->update($request);
    }

    public function allClients()
    {
        $clients = Clients::all();

        return json_encode($clients);
    }

}
