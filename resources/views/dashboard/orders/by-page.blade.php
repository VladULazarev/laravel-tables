<x-app-layout>
    <x-slot name="header">
      <div class="row">
        <div class="col-md-4">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Orders
          </h2>
        </div>

        <div class="col-md-3 position-relative">

          <!-- Select data for searching -->
          <select id="select-data" class="form-select form-control">

            <option value="">Select data for search</option>
            <option value="order_id" @if (session('column-name') == 'order_id') selected @endif>Order id</option>
            <option value="product_id" @if (session('column-name') == 'product_id') selected @endif>Product id</option>
            <option value="customers.last_name" @if (session('column-name') == 'customers.last_name') selected @endif>Customer last name</option>
            <option value="categories.category_name" @if (session('column-name') == 'categories.category_name') selected @endif>Category</option>
            <option value="order_date" @if (session('column-name') == 'order_date') selected @endif>Order date</option>
            <option value="total_sum" @if (session('column-name') == 'total_sum') selected @endif>Total sum</option>
            <option value="order_statuses.order_status_name" @if (session('column-name') == 'order_statuses.order_status_name') selected @endif>Status</option>
            <option value="shipped_date" @if (session('column-name') == 'shipped_date') selected @endif>Shipped date</option>
            <option value="orders.created_at" @if (session('column-name') == 'orders.created_at') selected @endif>Created</option>

          </select>

          <input type="text" id="search"
          name="search" class="form-control mt-3"
          autocomplete="off"
          maxlength="25"
          placeholder="Search..."
          data-table-name="orders">
          <span></span>

          <div id="select-data-tooltip" class="tooltip-product">
            Select data for searching!
          </div>

        </div>

        <div class="col-md-3">

          <!-- Search form -->
          <form method="POST">

            @csrf

            <!-- Set min total sum -->
            <input type="number" id="minTotalSum"
            name="minTotalSum" class="form-control"
            autocomplete="off"
            placeholder="Min total sum {{ session('min-total-sum') }}">
            <span></span>

            <!-- Set max unit price -->
            <input type="number" id="maxTotalSum"
            name="maxTotalSum" class="form-control mt-3"
            autocomplete="off"
            placeholder="Max total sum {{ session('max-total-sum') }}">

          </form>

        </div>

        <div class="col-md-2 text-center">

          <a href="{{ route('orders.create') }}" class="d-block btn-form btn-green mt-1 mb-1">
             Create an order
          </a>

          <button class="d-block btn-form btn-green mb-1 set-sum-btn">
             Set sum values
          </button>

          <button class="d-block btn-form btn-green mb-1 reset-search" data-table-name="orders">
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
              <th class="col-1">Product Id</th>
              <th class="col-1">Customer</th>
              <th class="col-1">Category</th>
              <th class="col-1">Order Date</th>
              <th class="col-1">Total Sum</th>
              <th class="col-1">Status</th>
              <th class="col-2">Comments</th>
              <th class="col-1">Shipped</th>
              <th class="col-1 text-center">Edit</th>
              <th class="col-1 text-center">Delete</th>
            </tr>

            <tr class="">
              <td class="col-1 text-center"></td>
              <td class="col-1"></td>
              <td class="col-1"></td>
              <td class="col-1"></td>
              <td class="col-1"></td>
              <td class="col-1"></td>
              <td class="col-1"></td>
              <td class="col-2"></td>
              <td class="col-1"></td>
              <td class="col-1 text-center"></td>
              <td class="col-1 text-center"></td>
            </tr>

          <!-- Show all records -->
          @foreach ($datas as $data)

            <tr class="record">
              <td class="col-1 text-center">{{ $data->order_id }}</td>
              <td class="col-1">{{ $data->product_id }}</td>
              <td class="col-1">
                <a href="{{ route('orders-by-customer.index', [ 'data' => $data->last_name ] ) }}"
                  class="record-link"
                  title="Select all orders of the customer">{{ $data->last_name }}
                </a>
              </td>
              <td class="col-1">{{ $data->category_name }}</td>
              <td class="col-1">@if ( $data->order_date ) {{ Carbon\Carbon::parse($data->order_date)->format('M d, Y') }} @endif</td>
              <td class="col-1">{{ number_format($data->total_sum, 2) }}</td>
              <td class="col-1">{{ $data->order_status_name }}</td>
              <td class="col-2">{{ Str::limit($data->comments, 15, '...') }}</td>
              <td class="col-1">@if ( $data->shipped_date ) {{ Carbon\Carbon::parse($data->shipped_date)->format('M d, Y') }} @endif</td>

              <td class="col-1 text-center btn-default btn-edit">
                <a class="d-block"
                    href="{{ route('orders.edit', [ 'data' => $data->order_id ] ) }}">
                    Edit
                </a>
              </td>
              <td class="col-1 text-center btn-default btn-delete">
                <a class="h-100 d-block"
                    href="{{ route('orders.destroy', [ 'data' => $data->order_id ] ) }}">
                    Delete
                </a>
              </td>
            </tr>

          @endforeach
          </table>

          {{-- Pager --}}
          {{ $datas->links() }}

          @if ( ! count($datas) )
              <div class='form-block form-item'><h5>No Orders</h5></div>
          @endif

          <p class="text-end pe-3 mb-4">
            <a href="{{ URL::previous() }}"
              class="btn-default btn-form btn-white">Back
            </a>
          </p>

        </div> <!-- end '.content'-->

      </div>
    </div>
</x-app-layout>
