<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'index',
        'address',
        'area'
    ];

    public function goods() {
        return $this->hasMany(Good::class);
    }
}
