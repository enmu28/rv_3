<?php

namespace App\Imports;

use App\Models\mst_imports;
use Maatwebsite\Excel\Concerns\ToModel;

class Imports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new mst_imports([
            'name' => $row[0],
            'email' => $row[1],
            'address' => $row[3],
            'tel_num' => $row[2],
        ]);
    }
}
