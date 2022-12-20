<x-app-layout>
  <x-slot name="header">
    <div class="row">
      <div class="col-md-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customers</h2>
      </div>

      <!-- Select data for searching -->
      <div class="col-md-3 position-relative">
        <select id="select-data" class="form-select form-control">
          <option value="">Select data for search</option>
          <option value="id" @if (session('column-name') == 'id') selected @endif>Customer id</option>
          <option value="first_name" @if (session('column-name') == 'first_name') selected @endif>First name</option>
          <option value="last_name" @if (session('column-name') == 'last_name') selected @endif>Last name</option>
          <option value="phone" @if (session('column-name') == 'phone') selected @endif>Phone</option>
          <option value="email" @if (session('column-name') == 'email') selected @endif>Email</option>
          <option value="address" @if (session('column-name') == 'address') selected @endif>Address</option>
          <option value="city" @if (session('column-name') == 'city') selected @endif>City</option>
          <option value="state" @if (session('column-name') == 'state') selected @endif>State</option>
        </select>

        <div id="select-data-tooltip" class="tooltip-customer">
          Select data for searching!
        </div>

      </div>

      <!-- Search form -->
      <div class="col-md-3">

        <form method="POST" action="{{ route('find-customers' ) }}">
          @csrf
          <input type="text" id="search"
          name="search" class="form-control"
          autocomplete="off"
          maxlength="25"
          placeholder="Search..."
          data-table-name="customers">
        </form>

      </div>

      <div class="col-md-2 text-center">

        <a href="{{ route('customers.create') }}" class="d-block btn-form btn-green mt-1">
           Create a customer
        </a>

        <button class="d-block btn-form btn-green mb-1 reset-search" data-table-name="customers">
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

      <!-- Show all records -->
        @foreach($datas as $data)

          <tr class="record">
            <td class="col-1 text-center">{{ $data->id }}</td>
            <td class="col-1">{{ $data->first_name }}</td>
            <td class="col-1">
              <a href="{{ route('orders-by-customer.index', [ 'data' => $data->last_name ] ) }}"
                class="record-link"
                title="Select all orders of the customer">{{ $data->last_name }}
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

        @endforeach

        </table>

        {{-- Pager --}}
        {{ $datas->links() }}

      </div> <!-- end 'content'-->

    </div>
  </div>
</x-app-layout>
