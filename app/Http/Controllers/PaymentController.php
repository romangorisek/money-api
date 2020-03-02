<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;

class PaymentController extends CrudController
{
    protected $model = Payment::class;
    protected $fields = ['done_on', 'amount', 'payment_type_id', 'work_id'];
}
