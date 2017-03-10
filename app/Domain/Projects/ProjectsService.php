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
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

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

    public function delete(Request $request)
    {
        $delete = $this->project->where('id', $request->get('id'))->delete();
        if ($delete){
            return "Projeto apagando com sucesso.";
        }else{
            return "Erro ao apagar projeto";
        }
    }

    public function toSeekProject(Request $request)
    {
        $project = $this->project->where('id', $request->get('id'))->first();
        $json = new Collection();
        $json->put('project', $project->toArray());
        return json_encode($json->toArray());
    }

    public function allProjects()
    {
        $projects = Projects::all();

        return json_encode($projects);
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

    public function projectsSteps()
    {
        $projectsSteps = DB::table('projects_steps')->get();

        return json_encode($projectsSteps);
    }

}