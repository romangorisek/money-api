<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends CrudController
{
    protected $model = Project::class;
    protected $fields = ['title', 'client_id'];
}
