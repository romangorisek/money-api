<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends CrudController
{
    protected $model = Expense::class;
    protected $fields = ['title'];

    public function all()
    {
        return Expense::allSortedByClicks();
    }
}
