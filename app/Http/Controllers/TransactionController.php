<?php

namespace App\Http\Controllers;

use App\Click;
use App\Transaction;

class TransactionController extends CrudController
{
    protected $model = Transaction::class;
    protected $fields = ["done_on", "amount", "type_id", "account_id"];
    
    public function create()
    {
        if ($transaction = Transaction::create(request($this->fields))) {
            Click::registerAll($transaction, auth()->user());
            return $transaction;
        }
        throw new \Exception("Item could not be created");
    }
}
