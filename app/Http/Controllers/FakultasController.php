<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //pagination
        // numbering
        $fakultas = Fakultas::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search);
        })->paginate(5);

        return view('fakultas.index', compact('fakultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
 
           $fakultas = new Fakultas;
           $fakultas->name = $request->name;
           $fakultas->save();


 
        return redirect('fakultas');
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
        $fakultas = Fakultas::find($id);
       return view('fakultas.edit', ['fakultas' => $fakultas]);
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
        $this->validate($request,[
           'name' => 'required',

        ]);

        $id_fakultas = $request['id'];
        $update = Fakultas::where('id',$id)->first();
        $update->name = $request['name'];
        $update->update();
        
        return redirect('fakultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        $fakultas->delete();
        return redirect('/fakultas');
    }
}
