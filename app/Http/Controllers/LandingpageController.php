<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\landingpage;
use App\Ruangan;
use App\User;

class LandingpageController extends Controller
{
	public function index(Request $request){


    $barang = landingpage::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_ruangan', '=', 'barang.ruangan_id')
        ->paginate(5);

        $user = User::all();

        return view('landingpage.index', compact('barang','user'))->with('i', (request()->input('page', 1) - 1) * 10);
	}

}
