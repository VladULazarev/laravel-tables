<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class OrderStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_status_id';

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
}
