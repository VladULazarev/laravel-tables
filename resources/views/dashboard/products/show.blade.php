<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product</h2>
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

          <tr class="record">
            <td class="col-1 text-center">{{ $data[0]->product_id }}</td>
            <td class="col-3 first-upper-case">{{ $data[0]->name }}</td>
            <td class="col-2">{{ $data[0]['category']->category_name }}</td>
            <td class="col-1">{{ $data[0]->quantity }}</td>
            <td class="col-1">{{ number_format($data[0]->unit_price, 2) }}</td>
            <td class="col-2">{{ $data[0]['productstatus']->status_name }}</td>
            <td class="col-1 text-center btn-default btn-edit">
              <a class="d-block"
                  href="{{ route('products.edit', [ 'data' => $data[0]->product_url_name ] ) }}">
                  Edit
              </a>
            </td>
            <td class="col-1 text-center btn-default btn-delete">
              <a class="d-block"
                  href="{{ route('products.destroy', [ 'data' => $data[0]->product_url_name ] ) }}">
                  Delete
              </a>
            </td>
          </tr>

        </table>

        <p class="text-end pe-3 mb-4">
          <a href="{{ route('products.index') }}" class="btn-form btn-white">Back to Products</a>
        </p>

      </div> <!-- end 'content'-->
    </div>
  </div>
</x-app-layout>
