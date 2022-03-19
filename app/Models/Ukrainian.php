<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukrainian extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'birth',
        'telephone',
        'gender',
        'address',
        'work',
        'stay',
        'children',
        'remarks',
        'created_by_id',
        'diia',
        'mobywatel',
        'rfid',
        'created_at',
        'updated_at',
    ];

    public function created_by()
    {
        return $this->hasOne(User::class, 'created_by_id', 'id');
    }

    public function ukrainian_visit()
    {
        return $this->HasMany(Ukrainian_visit::class, 'ukrainian_id', 'id');
    }
}
