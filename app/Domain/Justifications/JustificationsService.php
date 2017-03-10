<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 09/02/17
 * Time: 11:22
 */

namespace App\Domain\Justifications;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class JustificationsService
{
    private $justifications;

    function __construct(Justifications $justifications)
    {
        $this->justifications = $justifications;
    }

    public function store(Request $request)
    {
        return $this->justifications->create($request->all());
    }

    public function update(Request $request)
    {
        $justifications = $this->justifications->where('id', $request->get('id'))->first();
        $justifications->text = $request->get('text');
       
        if ($justifications->save()){
            return "Atualizado com sucesso.";
        }else{
            return "Erro na atualização.";
        }

    }

    public function allJustifications()
    {
        $justifications = Justifications::all();

        return json_encode($justifications);
    }

    public function toSeekJustification(Request $request)
    {
        $justification = $this->justifications->where('id', $request->get('id'))->first();
        $json = new Collection();
        $json->put('justification', $justification->toArray());
        return json_encode($json->toArray());
    }
}