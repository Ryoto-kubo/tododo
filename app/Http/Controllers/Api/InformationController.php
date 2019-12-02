<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function getInformation()
    {
        $payload = [];
        $payload['infomation_object'] = Information::get();
        return response()->json($payload);
    }
}
