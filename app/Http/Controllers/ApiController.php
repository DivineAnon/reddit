<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function brand_data($key)
    {
        if ($key != "13012000") {
            return $data = null;
        } else {
            $data = Brand::all()->toJson(JSON_PRETTY_PRINT);
            return response($data, 200);
        }
    }
}
