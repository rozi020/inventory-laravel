<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Ruangan;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ruangan = Ruangan::when($request->search, function($query) use($request){
            $query->where('nama_jurusan', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->join('jurusan', 'jurusan.id_jurusan', '=', 'ruangan.jurusan_id')
        ->paginate(5);

        return view('ruangan.ruangan_index', compact('ruangan'))->with('i', (request()->input('page', 1) - 1) * 5);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('ruangan.ruangan_create', compact('jurusan'));
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
            'jurusan_id' => 'required',
            'nama_ruangan'=>'required'
        ]);

        ruangan::create([
            'jurusan_id' => $request->jurusan_id,
            'nama_ruangan' => $request->nama_ruangan
        ]);

        return redirect('ruangan')->with('succes', 'Data is succesfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = Jurusan::all();
        $ruangan = Ruangan::findOrFail($id);
        return view('ruangan.ruangan_edit', compact('ruangan'))->with('jurusan', $jurusan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ruangan $ruangan)
    {
        $form_data = array(
            'jurusan_id' => $request->jurusan_id,
            'nama_ruangan' => $request->nama_ruangan
        );
        $ruangan->update($form_data);
        return redirect('/ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ruangan::findOrFail($id);
        $delete->delete();
        return redirect('/ruangan');
    }
}
