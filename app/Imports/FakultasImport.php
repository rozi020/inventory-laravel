<?php

namespace App\Imports;

use App\Fakultas;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FakultasImport implements ToModel, WithStartRow
{

    public function startRow():int

    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $column)
    {
        return new Fakultas([
            'name' => $column[1]
        ]);
    }
}
