<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\OrderStatus;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'order_id';

    public function path()
    {
        return route('orders.show', $this);
    }

    protected $with = ['orderstatus', 'category', 'customer'];

    public function orderstatus()
    {
        return $this->belongsto(OrderStatus::class, 'order_status_id');
    }

    public function category()
    {
        return $this->belongsto(Category::class, 'category_id');
    }

    public function customer()
    {
        return $this->belongsto(Customer::class, 'customer_id');
    }

    public static function getAllRecords()
    {
        $datas = Order::whereBetween('total_sum',

            [ session('min-total-sum'), session('max-total-sum') ]

        )
        ->latest('order_id' )
        ->paginate(5);

        return $datas;
    }

    public static function getRecordsBySearchData($columnName, $searchData)
    {
        $datas = Order::join(
          'order_statuses', 'orders.order_status_id', '=', 'order_statuses.order_status_id' )
        ->join(
          'categories', 'orders.category_id', '=', 'categories.category_id' )
        ->join(
          'customers', 'orders.customer_id', '=', 'customers.id' )
        ->select(
          'orders.order_id',
          'orders.product_id',
          'customers.first_name',
          'customers.last_name',
          'categories.category_name',
          'orders.order_date',
          'orders.unit_amount',
          'orders.total_sum',
          'order_statuses.order_status_name',
          'orders.comments',
          'orders.shipped_date',
          'orders.created_at')
          ->where("$columnName", 'like', "%$searchData%")
          ->where('orders.total_sum', '>=', session('min-total-sum'))
          ->where('orders.total_sum', '<=', session('max-total-sum'))
          ->latest('orders.order_id' )
          ->paginate(5);

        return $datas;
    }

    /**
     * For the method 'show()'
     */
    public static function getOneRecord($columnName, $searchData)
    {
        $datas = Order::where("$columnName", "$searchData")->get();

        return $datas;
    }

    public static function getOrdersByCustomer($customerId)
    {
        $datas = Order::where("customer_id", "$customerId")
          ->where('orders.total_sum', '>=', session('min-total-sum'))
          ->where('orders.total_sum', '<=', session('max-total-sum'))
          ->latest('orders.order_id')
          ->paginate(5);

        return $datas;
    }
}
