<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jurusan = Jurusan::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_jurusan', 'LIKE', '%'.$request->search.'%');
        })->join('fakultas', 'fakultas.id', '=', 'jurusan.id_fakultas')
        ->paginate(5);

        return view('jurusan.jurusan_index', compact('jurusan'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fakultas = Fakultas::all();
        return view('jurusan.jurusan_create', compact('fakultas'));
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
            'id_fakultas' => 'required',
            'nama_jurusan'=>'required'
        ]);

        jurusan::create([
            'id_fakultas' => $request->id_fakultas,
            'nama_jurusan' => $request->nama_jurusan
        ]);

        return redirect('jurusan')->with('succes', 'Data is succesfully Added.');
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
        $fakultas = Fakultas::all();
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.jurusan_edit', compact('jurusan'))->with('fakultas', $fakultas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jurusan $jurusan)
    {
        $form_data = array(
            'id_fakultas' => $request->id_fakultas,
            'nama_jurusan' => $request->nama_jurusan
        );
        $jurusan->update($form_data);
        return redirect('/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = jurusan::findOrFail($id);
        $delete->delete();
        return redirect('/jurusan');
    }
}
