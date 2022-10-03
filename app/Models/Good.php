<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity'
    ];

    public function sales() {
        return $this->hasMany(Sale::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function warehouse(){
        return $this->belongsTo(Warehouse::class);
    }
}
