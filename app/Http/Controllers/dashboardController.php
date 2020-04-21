<?php

namespace App\Http\Controllers;
use App\Fakultas;
use App\Barang;
use App\Jurusan;
use App\Ruangan;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
	public function index()
	{
		return view('dashboard.dashboard_index');
	}

    public function hitungtable()

  { 
     
     $jml_fakultas = Fakultas::count();
     $jml_jurusan = Jurusan::count();
     $jml_ruangan = Ruangan::count();
     $jml_barang = Barang::count();

     return view('dashboard.dashboard_index', compact('jml_fakultas','jml_jurusan','jml_ruangan','jml_barang'));


  }

}
