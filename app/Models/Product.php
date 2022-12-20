<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\ProductStatus;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'product_id';

    public function getRouteKeyName()
    {
        return 'product_url_name';
    }

    /**
     * Now, we can write Product::get();
     * instead of Product::with('category', 'productstatus')->get();
     */
    protected $with = ['category', 'productstatus'];

    public function path()
    {
        return route('products.show', $this);
    }

    public function category()
    {
        return $this->belongsto(Category::class, 'category_id');
    }

    public function productstatus()
    {
        return $this->belongsto(ProductStatus::class, 'status_id');
    }

    public static function getAllRecords()
    {
        $datas = Product::whereBetween('unit_price',

            [ session('min-unit-price'), session('max-unit-price') ]

        )
        ->latest('products.product_id')
        ->paginate(5);

        return $datas;
    }

    public static function getRecordsBySearchData($columnName, $searchData)
    {
        $datas = Product::join(
          'product_statuses', 'products.status_id', '=', 'product_statuses.status_id' )
        ->join(
          'categories', 'products.category_id', '=', 'categories.category_id' )
        ->select(
          'products.product_id',
          'products.name',
          'products.product_url_name',
          'categories.category_name',
          'products.quantity',
          'products.unit_price',
          'product_statuses.status_name')
        ->where("$columnName", 'like', "%$searchData%")
        ->whereBetween('unit_price',
          [ session('min-unit-price'), session('max-unit-price') ]
        )
        ->latest('products.product_id')
        ->paginate(5);

        return $datas;
    }

    /**
     * For the method 'show()' (we do not need 'sessions' here, we just show a selected record)
     */
    public static function getOneRecord($columnName, $searchData)
    {
        $datas = Product::where("$columnName", "$searchData")->get();

        return $datas;
    }
}
