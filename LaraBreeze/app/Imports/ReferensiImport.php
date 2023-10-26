<?php

namespace App\Imports;

use App\Models\Referensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ReferensiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Referensi([
            'id_ref'    => $row['id_ref'],
            'no_ref'    => $row['no_ref'],
            'keterangan'=> $row['keterangan'],
            'keterangan_label'  => $row['keterangan_label'],
        ]);
    }
}
