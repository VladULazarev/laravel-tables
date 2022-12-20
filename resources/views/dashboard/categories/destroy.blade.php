<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Delete the category</h2>
  </x-slot>

  <div class="py-12">
    <div class="delete-width mx-auto sm:px-6 lg:px-8">

      <div class="row content mb-5">
        <div class="col-lg-6">
          <section class="form-block relative break-words p-3 mt-3">

            <h5 class="mb-3">Are you sure to delete the categoty?</h5>

            <form method="POST" action="{{ route('delete-category', [ 'data' => $data->category_url_name ] ) }}">
              @csrf
              @method("DELETE")

              <div class="btn-container mt-3">
                <button type="submit" class="btn-default btn-form btn-red">Delete</button>
                <a href="{{ URL::previous() }}" class="btn-default btn-form btn-green">Back</a>
              </div>

            </form>

          </section>
        </div>
      </div> <!-- end 'content' -->

    </div>
  </div>
</x-app-layout>
