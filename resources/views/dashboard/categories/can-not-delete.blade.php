<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Category can not be deleted!
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="delete-width mx-auto sm:px-6 lg:px-8">

      <div class="row content mb-5">
        <div class="col-lg-6">
          <section class="form-block relative break-words p-3 mt-3">

            <h5 class="mb-3">Category can not be deleted!</h5>

            <p>There are products for this category in the DB.</p>

            <div class="btn-container mt-3">
              <a href="{{ URL::previous() }}"
                class="btn-default btn-form btn-green">Back
              </a>
            </div>

          </section>
        </div>
      </div> <!-- end 'content' -->

    </div>
  </div>
</x-app-layout>
