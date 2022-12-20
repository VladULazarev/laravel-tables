<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customer</h2>
  </x-slot>

  <div class="py-12">
    <div class="custom-width mx-auto sm:px-6 lg:px-8">

      <div class="content table-responsive">
        <table class="table">
          <tr class="table-header">
            <th class="col-1 text-center">Id</th>
            <th class="col-1">Name</th>
            <th class="col-1">Last Name</th>
            <th class="col-1">Phone</th>
            <th class="col-1">Email</th>
            <th class="col-3">Address</th>
            <th class="col-1">City</th>
            <th class="col-1">State</th>
            <th class="col-1 text-center">Edit</th>
            <th class="col-1 text-center">Delete</th>
          </tr>

          <tr class="">
            <td class="col-1 text-center"></td>
            <td class="col-1"></td>
            <td class="col-1"></td>
            <td class="col-1"></td>
            <td class="col-1"></td>
            <td class="col-3"></td>
            <td class="col-1"></td>
            <td class="col-1"></td>
            <td class="col-1 text-center"></td>
            <td class="col-1 text-center"></td>
          </tr>

          <tr class="record content">
            <td class="col-1 text-center">{{ $data->id }}</td>
            <td class="col-1">{{ $data->first_name }}</td>
            <td class="col-1">
              <a href="{{ route('customers.edit', [ 'data' => $data->last_name ] ) }}"
                class="record-link"
                title="Select all orders of the customer">
                {{ $data->last_name }}
              </a>
            </td>
            <td class="col-1">{{ $data->phone }}</td>
            <td class="col-1">{{ $data->email }}</td>
            <td class="col-3">{{ $data->address }}</td>
            <td class="col-1">{{ $data->city }}</td>
            <td class="col-1">{{ $data->state }}</td>
            <td class="col-1 text-center btn-default btn-edit">
              <a class="d-block"
                href="{{ route('customers.edit', [ 'data' => $data->last_name ] ) }}">
                Edit
              </a>
            </td>
            <td class="col-1 text-center btn-default btn-delete">
              <a class="d-block"
                href="{{ route('customers.destroy', [ 'data' => $data->last_name ] ) }}">
                Delete
              </a>
            </td>
          </tr>

        </table>

        <p class="text-end pe-3 mb-4">
          <a href="{{ route('customers.index') }}"
            class="btn-form btn-white">Back to Customers
          </a>
        </p>

      </div> <!-- end 'content'-->
    </div>
  </div>
</x-app-layout>
