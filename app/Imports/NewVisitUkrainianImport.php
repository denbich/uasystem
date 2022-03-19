<?php

namespace App\Imports;

use App\Models\Ukrainian_visit;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\RemembersRowNumber;

class NewVisitUkrainianImport implements ToModel, WithLimit
{

    use RemembersRowNumber;

    public function model(array $row)
    {
        $array = [
            'ukrainian_id' => $this->getRowNumber(),
            'user_id' => Auth::id(),
            'food' => 1,
            'clothes' => 1,
            'detergents' => 1,
            'created_at' => $row[0],
        ];

        return new Ukrainian_visit($array);
    }

    public function limit(): int
    {
        return 955;
    }
}
