<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\ValidatorController;

class CustomerController extends Controller
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
        if (! session('min-total-sum')) {
            SessionController::setSessionValuesForOrders();
        }

        $datas = Customer::latest('id')->paginate(7);

        return view('dashboard/customers.index', [ 'datas' => $datas ]);
    }

   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer $data
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $data)
    {
        return view('dashboard/customers.show', [ 'data' => $data ]);
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $data)
    {
        return view('dashboard/customers.edit', [ 'data' => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Customer $data
     * @return \Illuminate\Http\Response
     */
    public function update(Customer $data)
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
        return view('dashboard/customers.create');
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Customer $data
     * @return \Illuminate\Http\Response
     */
    public function store(Customer $data)
    {
        # Validate the input and create
        $data->create($this->validateInput());

        return redirect()->route('customers.show', ['data' => request('last_name') ]);
    }

    /**
     * Show the view for deleting the specified resource.
     *
     * @param  \App\Models\Customer $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $data)
    {
        return view('dashboard/customers.destroy', [ 'data' => $data ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer $data
     * @return \Illuminate\Http\Response
     */
    public function delete(Customer $data)
    {
        $data->delete();

        return redirect()->route('customers.index');
    }

    /**
     * Validate user's input
     */
    protected function validateInput()
    {
        return request()->validate([
            'first_name' => 'bail|required|string|min:2|max:50|',
            'last_name'  => 'bail|required|string|min:2|max:50|',
            'phone'      => 'bail|required|regex:/^([0-9\s\. \-\+\(\)]*)$/|min:10',
            'email'      => 'bail|required|regex:/^[\w.\-]{2,30}@[\w\-]{2,30}\.[A-Za-z]{2,6}$/',
            'address'    => 'bail|required|string|min:2|max:200|',
            'city'       => 'bail|required|string|min:2|max:50|',
            'state'      => 'bail|required|string|min:2|max:50|'
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
        # Column name
        $columnName = request()->columnName;

        # Data from the search field
        $searchData = request()->data;

        # Check if '$searchData' has 'bad' Characters
        (! ValidatorController::checkSearchField($searchData) ) ?? false;

        # Set session('search-data') for 'getRecordsByClickingPageLinks()'
        session()->put('search-data', request()->data);

        $datas = Customer::where("$columnName", 'like', "%$searchData%")
        ->latest($columnName)
        ->paginate(7);

        $foundRecords = $datas->count();

        if ( $foundRecords ) {
            return view('dashboard/customers.search-results', [ 'datas' => $datas ]);
        } else {
            return false;
        }
    }

    /**
     * Now, ARTER selecting in 'searchRecords()', we may have several links from 'paginate' entity
     *  on the current page. The method below works if click the paginate's link
     *
     * @return \Illuminate\Http\Response|false
     */
    public function getRecordsByClickingPageLinks()
    {
        $columnName = session('column-name');
        $searchData = session('search-data');

        $datas = Customer::where("$columnName", 'like', "%$searchData%")->latest($columnName)->paginate(7);

        $foundRecords = $datas->count();

        if ( $foundRecords ) {

            return view('dashboard/customers.index', [ 'datas' => $datas ]);

        } else {
            return false;
        }
    }
}
