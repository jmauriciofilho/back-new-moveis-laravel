<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 05/03/17
 * Time: 00:04
 */

namespace App\Domain\ProjectsSteps;


use Illuminate\Http\Request;

class ProjectsStepsService
{
    private $projectsSteps;

    function __construct(ProjectsSteps $projectsSteps)
    {
        $this->projectsSteps = $projectsSteps;
    }

    public function updateComplete(Request $request)
    {
        $projectSteps = $this->projectsSteps->where('id', $request->get('id'))->first();
        $projectSteps->complete = $request->get("complete");

        //O retorno deve ser 0 ou 1;
        if ($projectSteps->save()){
            return "Salvo com sucesso";
        } else {
            return "Erro ao salvar";
        }
    }

}