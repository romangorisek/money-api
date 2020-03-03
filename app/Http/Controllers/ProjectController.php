<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends CrudController
{
    protected $model = Project::class;
    protected $fields = ['title', 'client_id'];

    public function all()
    {
        $projects = Project::all();
        $projectsWithTraffic = [];
        foreach ($projects as $project) {
          array_push($projectsWithTraffic, $project->appendTraffic());
        }
        return $projects;
    }

    public function get($id)
    {
        $project = Project::find($id);
        return $project->appendTraffic();
    }
}
