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
        return $this->project->where('id', $request->get('id'))->update($request->all());
    }

    public function updateCompleted(Request $request)
    {
        $project = $this->project->where('id', $request->get('id'))->first();
        $project->completed = $request->get("completed");

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