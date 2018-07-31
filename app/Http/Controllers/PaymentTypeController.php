<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentType;

class PaymentTypeController extends CrudController
{
    protected $model = PaymentType::class;
}
