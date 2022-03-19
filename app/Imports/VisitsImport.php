<?php

namespace App\Imports;

use App\Models\Ukrainian_visit;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithLimit;

class VisitsImport implements ToModel, WithLimit
{
    public function model(array $row)
    {
        $id = $row[1] - 1;

        if (empty($row[2])) { $date = $row[0]; } else { $date = $row[2]." ".$row[3]; }

        switch($row[4])
        {
            case('ubrania'):
                $food = 0;
                $clothes = 1;
                $detergents = 0;
                break;
            case('jedzenie, ubrania'):
                $food = 1;
                $clothes = 1;
                $detergents = 0;
                break;
            default:
            $food = 0;
            $clothes = 1;
            $detergents = 0;
            break;
        }

        return new Ukrainian_visit([
            'ukrainian_id' => $id,
            'user_id' => Auth::id(),
            'food' => $food,
            'clothes' => $clothes,
            'detergents' => $detergents,
            'created_at' => $date,
        ]);
    }

    public function limit(): int
    {
        return 349;
    }
}
