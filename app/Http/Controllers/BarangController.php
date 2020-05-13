<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Ruangan;
use App\User;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;


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

        $user = User::all();

        return view('barang.barang_index', compact('barang','user'))->with('i', (request()->input('page', 1) - 1) * 5);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Ruangan::all();
        $user = User::all();
        return view('barang.barang_create', compact('data','user'));
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
     
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('image');
     
        $nama_file = time()."_".$file->getClientOriginalName();
     
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'image';
        $file->move($tujuan_upload,$nama_file);


        barang::create([
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            'image' => $nama_file,
            'created_by' => $request->created_by,
            
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
        $user = User::all();
        return view('barang.barang_edit', compact('barang','user','ruangan'));
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

        $nama_file = $request->hidden_image;
        $file = $request->file('image');

        if ($file !='') {
                $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
                $nama_file = time()."_".$file->getClientOriginalName();
                $tujuan_upload = 'image';
                $file->move($tujuan_upload,$nama_file);
        }else{
            $request->validate([
            'ruangan_id'=>'required',
            'nama_barang' => 'required',
            'total'=>'required',
            'broken'=>'required',
            'created_by'=>'required',
            ]);
        }

        $form_data = array(
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            'image' => $nama_file,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
            
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

    public function export(Request $request)
    {
        ob_end_clean(); // this
        ob_start(); // and this
        return Excel::download(new BarangExport, 'Barang-'.date("Y-m-d").'.xlsx');
    }

}


?>