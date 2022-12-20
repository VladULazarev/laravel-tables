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

  <tr class="record content">
    <td class="col-1 text-center">{{ $data->category_id }}</td>
    <td class="col-1">{{ $data->category_name }}</td>
    <td class="col-1">{{ $data->description }}</td>
    <td class="col-1 text-center btn-default btn-edit">
      <a class="d-block"
        href="{{ route('categories.edit', [ 'data' => $data->category_url_name] ) }}">
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
