<?php

namespace App\Imports;

use App\Driver;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DriverImport implements ToModel, WithHeadingRow, WithMultipleSheets
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Driver([
            'fname' => $row['fname'],
            'lname' => $row['lname']
        ]);
    }

    public function sheets(): array
    {
        return [
            0 => $this, //select first sheet 
            //1=>$this, is selecting second sheet and so on.
        ];
    }
}
