<?php

namespace App\Http\Controllers;

use App\Helpers\PriceFromUrlHelper;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
{
    public function index()
    {
        PriceFromUrlHelper::setPrice(2);

        return redirect('/');
    }
}
