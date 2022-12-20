<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'status_id';

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
