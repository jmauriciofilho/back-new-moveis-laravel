<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 01/02/17
 * Time: 09:46
 */

namespace App\Domain\Clients;


use App\Domain\Projects\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ClientsService
{
    private $client;

    function __construct(Clients $client)
    {
        $this->client = $client;
    }

    public function store(Request $request)
    {
        $this->client->create($request->all());
        $client = $this->client->where('name', $request->get('name'))->first();
        $json = new Collection();
        $json->put('client', $client->toArray());
        return json_encode($json->toArray());

    }

    public function update(Request $request)
    {
        $client = $this->client->where('id', $request->get('id'))->update($request->all());
        if ($client){
            return "Atualizado com sucesso.";
        }else{
            return "Erro na atualização.";
        }
    }

    public function delete(Request $request)
    {
        $detete = $this->client->where('id', $request->get('id'))->delete();
        if ($detete){
            return "Cliente apagado com sucesso.";
        }else{
            return "Erros ao apagar cliente.";
        }
    }

    public function toSeekClient(Request $request)
    {
        $client = $this->client->where('id', $request->get('id'))->first();
        $json = new Collection();
        $json->put('client', $client->toArray());
        return json_encode($json->toArray());
    }

    public function allClients()
    {
        $clients = Clients::all();

        return json_encode($clients);
    }

}