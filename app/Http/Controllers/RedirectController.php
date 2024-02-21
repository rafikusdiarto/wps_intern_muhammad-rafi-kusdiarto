<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $roleUser = \Auth::user()->roles()->pluck('name')[0];
        if($roleUser == 'DIREKTUR'){
            return redirect('/direktur');
        } elseif ($roleUser == 'MANAGER_OPS'){
            return redirect('/manager-operasional');
        } elseif ($roleUser == 'MANAGER_KEU'){
            return redirect('/manager-keuangan');
        } elseif ($roleUser == 'STAFF_OPS'){
            return redirect('/staff-operasional');
        }elseif ($roleUser == 'STAFF_keu'){
            return redirect('/staff-keuangan');
        }
        else {
            return redirect('/login');
        }
    }
}
