<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Category;
use App\Models\OrderStatus;
use App\Models\Customer;
use App\Http\Controllers\ValidatorController;
use App\Http\Controllers\SessionController;

class OrderController extends Controller
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
        # Set session for 'min total sum' and for 'max total sum' when the page
        #  'orders' is loading for the first time and check if session
        #   already exists when the page is loading again
        if (! session('min-total-sum')) {
            SessionController::setSessionValuesForOrders();
        }

        $datas = Order::getAllRecords();

        return view('dashboard/orders.index', [ 'datas' => $datas ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order $data
     * @return \Illuminate\Http\Response
     */
    public function show(Order $data)
    {
        $searchData = $data->order_id;

        $data = Order::getOneRecord('order_id', $searchData);

        return view('dashboard/orders.show', [ 'data' => $data ]);
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $data)
    {
        $categories = Category::get();
        $statuses   = OrderStatus::get();

        return view('dashboard/orders.edit', [
          'data'       => $data,
          'categories' => $categories,
          'statuses'   => $statuses
        ]);
    }

   /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Order $data
     * @return \Illuminate\Http\Response
     */
    public function update(Order $data)
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
        $statuses   = OrderStatus::get();

        return view('dashboard/orders.create', [
            'categories' => $categories,
            'statuses'   => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Order $data
     * @return \Illuminate\Http\Response
     */
    public function store(Order $data)
    {
        # Validate the input and create
        $data->create($this->validateInput());

        # Get last record (we need 'order_id' of this order)
        $lastRecord = Order::latest()->first();

        return to_route('orders.show', ['data' => $lastRecord->order_id ]);
    }

   /**
     * Show the view for deleting the specified resource.
     *
     * @param  \App\Models\Order $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $data)
    {
        return view('dashboard/orders.destroy', [ 'data' => $data ]);
    }

    /**
     * Remove the specified resource from the storage.
     *
     * @param  \App\Models\Order $data
     * @return \Illuminate\Http\Response
     */
    public function delete(Order $data)
    {
        $data->delete();
        return to_route('orders.index');
    }

    /**
     * Validate user's input
     */
    protected function validateInput()
    {
        return request()->validate([
            'product_id'   => 'bail|required|numeric|min:1|max:9999',
            'customer_id'  => 'bail|required|numeric|min:1|max:9999',
            'category_id' => 'bail|required|numeric|min:1|max:20',
            'order_date'    => 'bail|nullable|date|date_format:Y-m-d',  # hidden form field
            'total_sum'    => 'bail|required|numeric|min:0.1|max:9999',
            'order_status_id' => 'bail|required|string|min:1|max:50',
            'comments'     => 'bail|required|string|min:1|max:100',
            'shipped_date' => 'bail|nullable|date|date_format:Y-m-d'
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
        if (! session('min-total-sum')) {
            SessionController::setSessionValuesForOrders();
        }

        # Return 'false' to -- 3. Type something in the 'Search...' form, and
        #  stop the script
        (! ValidatorController::checkSearchField(request()->data) ) ?? false;

        # Set session('search-data') for 'getRecordsByClickingPageLinks()'
        session()->put('search-data', request()->data);

        $datas = Order::getRecordsBySearchData(request()->columnName, request()->data);

        $foundRecords = $datas->count();

        if ( $foundRecords ) {

            return view('dashboard/orders.search-results', [ 'datas' => $datas ]);

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
        $datas = Order::getRecordsBySearchData(session('column-name'), session('search-data'));

        $foundRecords = $datas->count();

        if ( $foundRecords ) {

            return view('dashboard/orders.by-page', [ 'datas' => $datas ]);

        } else {
            return false;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Customer $data
     * @return \Illuminate\Http\Response
     */
    public function ordersByCustomer(Customer $data)
    {
        $datas = Order::getOrdersByCustomer($data->id);

        return view('dashboard/orders.index', [ 'datas' => $datas ]);
    }
}
