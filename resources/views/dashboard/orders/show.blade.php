<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Order</h2>
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

            <tr class="record">
              <td class="col-1 text-center">{{ $data[0]->order_id }}</td>
              <td class="col-1">{{ $data[0]->product_id }}</td>
              <td class="col-1">{{ $data[0]['customer']->last_name }}</td>
              <td class="col-1">{{ $data[0]['category']->category_name }}</td>
              <td class="col-1">@if ( $data[0]->order_date ) {{ Carbon\Carbon::parse($data[0]->order_date)->format('M d, Y') }} @endif</td>
              <td class="col-1">{{ number_format($data[0]->total_sum, 2) }}</td>
              <td class="col-1">{{ $data[0]['orderstatus']->order_status_name }}</td>
              <td class="col-2">{{ Str::limit($data[0]->comments, 15, '...') }}</td>
              <td class="col-1">@if ( $data[0]->shipped_date ) {{ Carbon\Carbon::parse($data[0]->shipped_date)->format('M d, Y') }} @endif</td>

              <td class="col-1 text-center btn-default btn-edit">
                <a class="d-block"
                    href="{{ route('orders.edit', [ 'data' => $data[0]->order_id ] ) }}">
                    Edit
                </a>
              </td>
              <td class="col-1 text-center btn-default btn-delete">
                <a class="d-block"
                    href="{{ route('orders.destroy', [ 'data' => $data[0]->order_id ] ) }}">
                    Delete
                </a>
              </td>
            </tr>

          </table>

          <p class="text-end pe-3 mb-4">
            <a href="{{ route('orders.index') }}"
              class="btn-form btn-white">Back to orders
            </a>
          </p>

        </div> <!-- end 'content'-->

      </div>
    </div>
</x-app-layout>
