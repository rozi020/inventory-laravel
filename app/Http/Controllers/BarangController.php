<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Ruangan;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $barang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_ruangan', '=', 'barang.ruangan_id')
        ->paginate(5);

        return view('barang.barang_index', compact('barang'))->with('i', (request()->input('page', 1) - 1) * 10);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Ruangan::all();
        // $user = User::all();
        return view('barang.barang_create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ruangan_id'=>'required',
            'nama_barang' => 'required',
            'total'=>'required',
            'broken'=>'required',
            
        ]);

        barang::create([
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            
        ]);

        return redirect('/barang')->with('succes', 'Data is succesfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $ruangan = Ruangan::all();
        $barang = Barang::findOrFail($id);
        return view('barang.barang_edit', compact('barang','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = array(
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            
        );
        barang::where('id_barang',$id)->update($form_data);
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = barang::findOrFail($id);
        $delete->delete();
        return redirect('/barang');
    }
}
