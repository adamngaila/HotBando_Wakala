<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\vifurushi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VifurushiController extends Controller
{
    public function getKifurushiPrice($kifurushiId) {


        $kifurushi = vifurushi::find($kifurushiId);
        if ($kifurushi) {
            return response()->json(['price' => $kifurushi->amount]);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}
