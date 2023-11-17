<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'catalog_id', 'detail', 'quantity'
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
