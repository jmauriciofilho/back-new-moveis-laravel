<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 01/02/17
 * Time: 09:46
 */

namespace App\Domain\Clients;


use Illuminate\Http\Request;

class ClientsService
{
    private $client;

    function __construct(Clients $client)
    {
        $this->client = $client;
    }

    public function store(Request $request)
    {
        return $this->client->create($request->all());
    }

    public function update(Request $request)
    {
        return $this->client->where('id', $request->get('id'))->update($request->all());
    }

}