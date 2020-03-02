<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AccountTransfer;
use App\Account;

class AccountTransferController extends CrudController
{
    protected $model = AccountTransfer::class;
    protected $fields = ['account_from_id', 'account_to_id', 'amount'];

    public function create()
    {
        $transaction = DB::transaction(function () {
          $item = ($this->model)::create(request($this->fields));
          $accountFrom = Account::find(request()->input('account_from_id'));
          $accountFrom->update(['balance' => ((int) $accountFrom->balance - request()->input('amount'))]);
          $accountTo = Account::find(request()->input('account_to_id'));
          $accountTo->update(['balance' => ((int) $accountTo->balance + request()->input('amount'))]);
        }, 1);
        if ($transaction) {
            return $transaction;
        }
        throw new \Exception("Item could not be created");
    }
}
