<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukrainian_visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ukrainian_id',
        'user_id',
        'food',
        'clothes',
        'detergents',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function ukrainians()
    {
        return $this->hasMany(Ukrainian::class, 'id', 'ukrainian_id');
    }
}
