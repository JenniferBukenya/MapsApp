<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends Controller
{

    public function showMaps($id)
    {
        $hives = DB::table('hives')->where('farm_id', $id)->get();
        $farm = DB::table('farms')->where('id', $id)->get();

        return view('maps', compact('farm', 'hives'));
    }

    // public function showMaps()
    // {
    //     $hives = DB::table('hives')->get();
    //     return view('maps', compact('hives'));
    // }

    public function showFarms()
    {
        $farms = DB::table('farms')->get();
        return view('farms', compact('farms'));
    }
}
