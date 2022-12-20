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
@foreach($datas as $data)

  <tr class="record content">
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
