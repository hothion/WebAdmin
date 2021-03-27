<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
class Admin extends Controller
{
    public function getProduct()
    {
        return products::all();
    }
}
