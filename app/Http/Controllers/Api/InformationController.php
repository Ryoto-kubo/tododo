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
        $payload['information_object'] = Information::orderBy('id', 'desc')->get();
        return response()->json($payload);
    }
}