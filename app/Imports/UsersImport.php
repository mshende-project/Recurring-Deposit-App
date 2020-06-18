<?php

namespace App\Imports;

use App\RdUser;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class UsersImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RdUser([
            'id' => $row[0],
            'rd_acc_no' => $row[1],
            'name' => $row[2],
            'address' => $row[3],
            'dop' => $row[4],
            'rupees' => $row[5],
            'nominee' => $row[6],
            'as_card_no' => $row[7],
            'dom' => $row[8],
            'remark_kyc' => $row[9],
            'pan_no' => $row[10],
            'election_card_no' => $row[11],
            'adhar_card_no' => $row[12],
            'mobile_no' => $row[13],
            'dob' => $row[14]
        ]);
    }

    public function startRow():int
    {
        return 2;
    }
}
