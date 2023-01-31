<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

class HelperController extends Controller
{
    public function helper_inicio()
    { 
        $version = Helpers::getVersion();
        // $texto = Helpers::getName("Aram Espinosa");
        return view('helper.home');
    }
}
