<?php

namespace App\Exports;

use App\Models\mst_customers;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return mst_customers::all();
    }
}
