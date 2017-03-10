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

    public function delete(Request $request)
    {
        return $this->clientsService->delete($request);
    }

    public function toSeekClient(Request $request)
    {
        return $this->clientsService->toSeekClient($request);
    }

    public function allClients()
    {
       return $this->clientsService->allClients();
    }

}
