<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductStatus;
use App\Http\Controllers\ValidatorController;
use App\Http\Controllers\SessionController;

class ProductController extends Controller
{
    /**
     * Note:
     * $data means - one record
     * $datas means - many records (collection of records)
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Set session for 'min unit price' and for 'max unit price' when the page
        #  'products' is loading for the first time and check if session
        #   already exists when the page is loading again
        if (! session('min-unit-price')) {
            SessionController::setSessionValuesForProducts();
        }

        $datas = Product::getAllRecords();

        return view('dashboard/products.index', [ 'datas' => $datas ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $data
     * @return \Illuminate\Http\Response
     */
    public function show(Product $data)
    {
        $searchData = $data->product_id;

        $data = Product::getOneRecord('product_id', $searchData);

        return view('dashboard/products.show', [ 'data' => $data ]);
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $data)
    {
        $categories = Category::get();
        $statuses   = ProductStatus::get();

        return view('dashboard/products.edit', [
          'data'       => $data,
          'categories' => $categories,
          'statuses'   => $statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Product $data
     * @return \Illuminate\Http\Response
     */
    public function update(Product $data)
    {
        # Validate the input and update
        $data->update($this->validateInput());

        # Show an upated record
        return redirect($data->path());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $statuses   = ProductStatus::get();

        return view('dashboard/products.create', [
            'categories' => $categories,
            'statuses'   => $statuses
        ]);
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Product $data
     * @return \Illuminate\Http\Response
     */
    public function store(Product $data)
    {
        # Validate the input and create
        $data->create($this->validateInputAndUniqueness());

        return to_route('products.show', [ 'data' => request('product_url_name') ]);
    }

   /**
     * Show the view for deleting the specified resource.
     *
     * @param  \App\Models\Product $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $data)
    {
        return view('dashboard/products.destroy', [ 'data' => $data ]);
    }

    /**
     * Remove the specified resource from the storage.
     *
     * @param  \App\Models\Product $data
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $data)
    {
        $data->delete();
        return to_route('products.index');
    }

    /**
     * Validate user's input
     */
    protected function validateInput()
    {
        return request()->validate([
            'name'         => 'bail|required|min:2|max:50|',
            'product_url_name' => 'bail|required|min:2|max:50|regex:/^[a-z0-9\-]+$/',
            'category_id'  => 'bail|required|numeric|min:1|max:10',
            'quantity'     => 'bail|required|numeric|min:0|max:1000|',
            'unit_price'   => 'bail|required|numeric|min:0.1|max:1000|',
            'status_id'    => 'bail|required|numeric|min:1|max:10|',
        ]);
    }

    /**
     * Validate user's input and uniqueness (for storing a new product)
     */
    protected function validateInputAndUniqueness()
    {
        return request()->validate([
            'name'         => 'bail|required|min:2|max:50|unique:products',
            'product_url_name' => 'bail|required|min:2|max:50|unique:products|regex:/^[a-z0-9\-]+$/',
            'category_id'  => 'bail|required|numeric|min:1|max:10',
            'quantity'     => 'bail|required|numeric|min:0|max:1000|',
            'unit_price'   => 'bail|required|numeric|min:0.1|max:1000|',
            'status_id'    => 'bail|required|numeric|min:1|max:10|',
        ]);
    }

    /**
     * Search records if typing something in the 'Search' field
     *
     * @see public\build\assets\app.ab93cf8a.js -- 3. Type something in the 'Search...' form
     * @return \Illuminate\Http\Response|false
     */
    public function searchRecords()
    {
        # Set session if it is not existed
        if (! session('min-unit-price')) {
            SessionController::setSessionValuesForProducts();
        }

        # Return 'false' to -- 3. Type something in the 'Search...' form, and
        #  stop the script
        (! ValidatorController::checkSearchField(request()->data) ) ?? false;

        # Set session('search-data') for 'getRecordsByClickingPageLinks()'
        session()->put('search-data', request()->data);

        $datas = Product::getRecordsBySearchData(request()->columnName, request()->data);

        $foundRecords = $datas->count();

        if ( $foundRecords ) {

            return view('dashboard/products.search-results', [ 'datas' => $datas ]);

        } else {
            return false;
        }
    }

    /**
     * Now, ARTER selecting in 'searchRecords()', we may have several links in the
     * 'paginate' entity on the current page.
     *  The method below works if click the paginate's link
     *
     * session('column-name') is set when user selects a new 'columnName'
     * from 'Select data for search' menu
     *
     * @see public\build\assets\app.ab93cf8a.js --- 5. Set session for selected 'column' name
     * @return \Illuminate\Http\Response|false
     */
    public function getRecordsByClickingPageLinks()
    {
        $datas = Product::getRecordsBySearchData(session('column-name'), session('search-data'));

        $foundRecords = $datas->count();

        if ( $foundRecords ) {

            return view('dashboard/products.by-page', [ 'datas' => $datas ]);

        } else {
            return false;
        }
    }
}
