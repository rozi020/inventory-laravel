<?php

namespace App\Exports;

use App\Barang;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::all();
    }
}

?>