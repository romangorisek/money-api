<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends CrudController
{
    protected $model = Work::class;
    protected $fields = [ 'done_on_start', 'done_on_end', 'hours', 'amount', 'project_id'];
}
