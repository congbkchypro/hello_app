<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function getURL(Request $request) {
        return $request->url();
    }
}
