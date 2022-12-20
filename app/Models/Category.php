<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Orders;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'category_id';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function getRouteKeyName()
    {
        return 'category_url_name';
    }

    public function path()
    {
        return route('categories.show', $this);
    }
}
