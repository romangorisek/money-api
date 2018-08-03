<?php

namespace App\Http\Controllers;

use App\Transaction;

class TransactionController extends CrudController
{
    protected $model = Transaction::class;
    protected $fields = ["done_on", "amount", "type_id"];
}
