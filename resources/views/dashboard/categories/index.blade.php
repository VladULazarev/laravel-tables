<x-app-layout>
    <x-slot name="header">
      <div class="row">
        <div class="col-md-4">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              Categories
          </h2>
        </div>

        <!-- Select data for searching -->
        <div class="col-md-3 position-relative">
          <select id="select-data" class="form-select form-control">
            <option value="">Select data for search</option>
            <option value="category_name" @if (session('column-name') == 'category_name') selected @endif>Category name</option>
            <option value="description" @if (session('column-name') == 'description') selected @endif>Description</option>
          </select>

          <div id="select-data-tooltip" class="tooltip-customer">Select data for searching!</div>

        </div>

        <!-- Search form -->
        <div class="col-md-3">

          <form method="POST" action="{{ route('find-categories' ) }}">
            @csrf
            <input type="text" id="search"
            name="search" class="form-control"
            autocomplete="off"
            maxlength="25"
            placeholder="Search..."
            data-table-name="categories">
          </form>

        </div>

        <div class="col-md-2 text-center">

          <a href="{{ route('categories.create') }}" class="d-block btn-form btn-green mt-1">
             Create a category
          </a>

          <button class="d-block btn-form btn-green mb-1 reset-search" data-table-name="categories">
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
              <th class="col-2 text-center">Id</th>
              <th class="col-3">Category Name</th>
              <th class="col-3">Description</th>
              <th class="col-2 text-center">Edit</th>
              <th class="col-2 text-center">Delete</th>
            </tr>

            <tr class="">
              <td class="col-2 text-center"></td>
              <td class="col-3"></td>
              <td class="col-3"></td>
              <td class="col-2 text-center"></td>
              <td class="col-2 text-center"></td>
            </tr>

          <!-- Show all records -->
          @foreach($datas as $data)

            <tr class="record">
              <td class="col-1 text-center">{{ $data->category_id }}</td>
              <td class="col-1">{{ $data->category_name }}</td>
              <td class="col-1">{{ $data->description }}</td>
              <td class="col-1 text-center btn-default btn-edit">
                <a class="d-block"
                  href="{{ route('categories.edit', [ 'data' => $data->category_url_name ] ) }}">
                  Edit
                </a>
              </td>
              <td class="col-1 text-center btn-default btn-delete">
                <a class="d-block"
                  href="{{ route('categories.destroy', [ 'data' => $data->category_url_name ] ) }}">
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
