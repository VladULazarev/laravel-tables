<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Category::latest('category_id')->paginate(7);

        return view('dashboard/categories.index', [ 'datas' => $datas ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $data
     * @return \Illuminate\Http\Response
     */
    public function show(Category $data)
    {
        return view('dashboard/categories.show', [ 'data' => $data ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $data)
    {
        return view('dashboard/categories.edit', [ 'data' => $data ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Category $data
     * @return \Illuminate\Http\Response
     */
    public function update(Category $data)
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
        return view('dashboard/categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\Category $data
     * @return \Illuminate\Http\Response
     */
    public function store(Category $data)
    {
        # Validate the input and create
        $data->create($this->validateInputAndUniqueness());

        return redirect()->route('categories.show', [ 'data' => request('category_url_name') ]);
    }

    /**
     * Show the view for deleting the specified resource.
     *
     * @param  \App\Models\Category $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $data)
    {
        $ordersOfCurrentCategory = Order::where('category_id', $data->category_id)->get();

        $foundRecords = count($ordersOfCurrentCategory);

        if ( $foundRecords ) {
            return view('dashboard/categories.can-not-delete');
        } else {
            return view('dashboard/categories.destroy', [ 'data' => $data ]);
        }
    }

    /**
     * Remove the specified resource from the storage.
     *
     * @param  \App\Models\Category $data
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $data)
    {
        $data->delete();
        return redirect()->route('categories.index');
    }

    /**
     * Validate user's input
     */
    protected function validateInput()
    {
        return request()->validate([
          'category_name'     => 'bail|required|min:2|max:50',
          'category_url_name' => 'bail|required|min:2|max:50|regex:/^[a-z0-9\-]+$/',
          'description'       => 'bail|required|min:2|max:100|'
        ]);
    }

    /**
     * Validate user's input and uniqueness (for storing a new category)
     */
    protected function validateInputAndUniqueness()
    {
        return request()->validate([
          'category_name'     => 'bail|required|unique:categories|min:2|max:50',
          'category_url_name' => 'bail|required|unique:categories|min:2|max:50|regex:/^[a-z0-9\-]+$/',
          'description'       => 'bail|required|unique:categories|min:10|max:100|'
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

        $datas = Category::where("$columnName", 'like', "%$searchData%")
        ->latest($columnName)
        ->paginate(7);

        $foundRecords = $datas->count();

        if ( $foundRecords ) {
            return view('dashboard/categories.search-results', [ 'datas' => $datas ]);
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

        $datas = Category::where("$columnName", 'like', "%$searchData%")->latest($columnName)->paginate(7);

        $foundRecords = $datas->count();

        if ( $foundRecords ) {

            return view('dashboard/categories.index', [ 'datas' => $datas ]);

        } else {
            return false;
        }
    }
}
