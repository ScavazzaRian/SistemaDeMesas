<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function showINdex(){
        return view('app.index.index');
    }
}
