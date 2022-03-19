<?php

namespace App\Imports;

use App\Models\Ukrainian;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithLimit;

class UkrainianImport implements ToModel, WithLimit
{
    public function model(array $row)
    {
        switch($row[8])
        {
            case('tak'):
                $stay = 'tak';
                break;
            case('nie'):
                $stay = 'nie';
                break;
            case('Może'):
                $stay = 'może';
                break;
            default:
                $stay = 'może';
            break;

        }
        $array = [
            'firstname' => $row[2],
            'lastname' => $row[1],
            'birth' => $row[4],
            'telephone' => $row[3],
            'gender' => $row[5] == 'Kobieta' ? 'f' : 'm',
            'address' => $row[6],
            'work' => $row[7],
            'stay' => $stay,
            'children' => $row[9],
            'remarks' => $row[10],
            'card_id' => null,
            'rfid' => null,
            'created_by_id' => Auth::id(),
            'created_at' => $row[0],
        ];

        return new Ukrainian($array);
    }

    public function limit(): int
    {
        return 955;
    }
}
