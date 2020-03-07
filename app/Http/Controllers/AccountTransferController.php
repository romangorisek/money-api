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
        return DB::transaction(function () {
          $item = ($this->model)::create(request($this->fields));
          $accountFrom = Account::find(request()->input('account_from_id'));
          if (!$accountFrom->update(['balance' => ((int) $accountFrom->balance - request()->input('amount'))])) {
            throw new \Exception("Item could not be created");
          }
          $accountTo = Account::find(request()->input('account_to_id'));
          if (!$accountTo->update(['balance' => ((int) $accountTo->balance + request()->input('amount'))])) {
            throw new \Exception("Item could not be created");
          }
          return response()->json(['message' => 'Transaction saved!']);
        }, 1);
    }
}
