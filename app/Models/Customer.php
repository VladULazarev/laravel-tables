<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'last_name';
    }

    public function path()
    {
        return route('customers.show', $this);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
