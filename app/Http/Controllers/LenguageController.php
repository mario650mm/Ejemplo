<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class LenguageController extends Controller
{

    public function changeLenguage(Request $request)
    {
        //dd(Session::getFacadeRoot());
        //dd($request->request);
        $lenguage = $request->lenguageHidden;
        //$request->session()->set('locale','es');
        Session::put('locale','en');

        //Session::save();
        //return redirect('/home');
    }
}
