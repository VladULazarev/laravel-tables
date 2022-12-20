<x-app-layout>
  <x-slot name="header">
    <div class="row">
      <div class="col-md-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Products</h2>
      </div>

      <div class="col-md-3 position-relative">

        <!-- Select data for searching -->
        <select id="select-data" class="form-select form-control">
          <option value="">Select data for search</option>
          <option value="product_id" @if (session('column-name') == 'product_id') selected @endif>Product id</option>
          <option value="name" @if (session('column-name') == 'name') selected @endif>Product name</option>
          <option value="quantity" @if (session('column-name') == 'quantity') selected @endif>Quantity</option>
          <option value="unit_price" @if (session('column-name') == 'unit_price') selected @endif>Unit price</option>
          <option value="product_statuses.status_name" @if (session('column-name') == 'product_statuses.status_name') selected @endif>Status</option>
          <option value="categories.category_name" @if (session('column-name') == 'categories.category_name') selected @endif>Category</option>
        </select>

        <input type="text" id="search"
        name="search" class="form-control mt-3"
        autocomplete="off"
        maxlength="25"
        placeholder="Search..."
        data-table-name="products">
        <span></span>

        <div id="select-data-tooltip" class="tooltip-product">
          Select data for searching!
        </div>

      </div>

      <div class="col-md-3">

        <!-- Search form -->
        <form method="POST">

          @csrf

          <!-- Set min unit price -->
          <input type="number" id="minUnitPrice"
          name="minUnitPrice" class="form-control"
          autocomplete="off"
          placeholder="Min price {{ session('min-unit-price') }}">
          <span></span>

          <!-- Set max unit price -->
          <input type="number" id="maxUnitPrice"
          name="maxUnitPrice" class="form-control mt-3"
          autocomplete="off"
          placeholder="Max price {{ session('max-unit-price') }}">

        </form>

      </div>

      <div class="col-md-2 text-center">

        <a href="{{ route('products.create') }}" class="d-block btn-form btn-green mt-1 mb-1">
           Create a product
        </a>

        <button class="d-block btn-form btn-green mb-1 set-price-btn">
           Set price values
        </button>

        <button class="d-block btn-form btn-green mb-1 reset-search" data-table-name="products">
           Reset Search
        </button>

      </div>

    </div> <!-- end 'row' -->
  </x-slot>

  <div class="py-12">
    <div class="custom-width mx-auto sm:px-6 lg:px-8">

      <div class="content table-responsive">

        <table class="table">

          <tr class="table-header">

              <th class="col-1 text-center">Id</th>
              <th class="col-3">Product Name</th>
              <th class="col-2">Category</th>
              <th class="col-1">Quantity</th>
              <th class="col-1">Unit Price</th>
              <th class="col-2">Status</th>
              <th class="col-1 text-center">Edit</th>
              <th class="col-1 text-center">Delete</th>

          </tr>

          <tr class="">

              <td class="col-1 text-center"></td>
              <td class="col-3"></td>
              <td class="col-2"></td>
              <td class="col-1"></td>
              <td class="col-1"></td>
              <td class="col-2"></td>
              <td class="col-1 text-center"></td>
              <td class="col-1 text-center"></td>

          </tr>

      <!-- Show all records -->
        @foreach ($datas as $data)

          <tr class="record">
              <td class="col-1 text-center">{{ $data->product_id }}</td>
              <td class="col-3 first-upper-case">{{ $data->name }}</td>
              <td class="col-2">{{ $data->category_name }}</td>
              <td class="col-1">{{ $data->quantity }}</td>
              <td class="col-1">{{ number_format($data->unit_price, 2) }}</td>
              <td class="col-2">{{ $data->status_name }}</td>
              <td class="col-1 text-center btn-default btn-edit">
                <a class="d-block"
                   href="{{ route('products.edit', [ 'data' => $data->product_url_name ] ) }}">
                   Edit
                </a>
              </td>
              <td class="col-1 text-center btn-default btn-delete">
                <a class="d-block"
                   href="{{ route('products.destroy', [ 'data' => $data->product_url_name ] ) }}">
                   Delete
                </a>
              </td>
          </tr>

        @endforeach
        </table>

        {{-- Pager --}}
        {{ $datas->links() }}

        @if ( ! count($datas) )
            <div class='form-block form-item'><h5>Nothing Found</h5></div>
        @endif
      </div> <!-- end '.content'-->

    </div>
  </div>
</x-app-layout>
