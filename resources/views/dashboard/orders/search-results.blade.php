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
@foreach($datas as $data)

  <tr class="record content">
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
        <a class="d-block"
           href="{{ route('orders.destroy', [ 'data' => $data->order_id ] ) }}">
           Delete
        </a>
      </td>
  </tr>

@endforeach

</table>

{{-- Pager --}}
{{ $datas->links() }}
