<?php
/**
 * Created by IntelliJ IDEA.
 * User: mauricio
 * Date: 31/01/17
 * Time: 23:54
 */

namespace App\Domain\Projects;

use App\Domain\Steps\Steps;
use Illuminate\Http\Request;
class ProjectsService
{
    private $project;

    function __construct(Projects $project)
    {
        $this->project = $project;
    }

    public function store(Request $request)
    {
        $steps = Steps::all();

        return $this->project->create($request->all())->steps()->sync($steps);
    }

    public function update(Request $request)
    {
        $project = $this->project->where('id', $request->get('id'))->update($request->all());

        if ($project){
            return "Atualizado com sucesso.";
        }else{
            return "Erro na atualização.";
        }
    }

    public function updateCompleted(Request $request)
    {
        $project = $this->project->where('id', $request->get('id'))->first();
        $project->completed = $request->get("completed");

        //O retorno deve ser 0 ou 1;
        if ($project->save()){
            return "Salvo com sucesso";
        } else {
            return "Erro ao salvar";
        }
    }

    public function updateCurrentStep(Request $request)
    {
        $project = $this->project->where('id', $request->get('id'))->first();
        $project->current_step = $request->get("current_step");

        if ($project->save()){
            return "Salvo com sucesso";
        } else {
            return "Erro ao salvar";
        }
    }

}