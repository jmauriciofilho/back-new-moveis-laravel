<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 03/02/17
 * Time: 12:53
 */

namespace App\Domain\Steps;


use Illuminate\Http\Request;

class StepsService
{
    private $steps;

    function __construct(Steps $steps)
    {
        $this->steps = $steps;
    }

    public function updateDays(Request $request)
    {
        $steps = $this->steps->where('id', $request->get('id'))->first();
        $steps->days = $request->get("days");

        if ($steps->save()){
            return "Salvo com sucesso";
        } else {
            return "Erro ao salvar";
        }
    }

}