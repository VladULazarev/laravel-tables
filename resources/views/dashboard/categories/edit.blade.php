<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit a category</h2>
  </x-slot>

  <div class="py-12">
    <div class="create-width mx-auto sm:px-6 lg:px-8">

      <div class="row content mb-5">
        <div class="col-lg-6">
          <section class="relative break-words p-3 mt-3">

            <form method="POST" action="{{ route('update-category', [ 'data' => $data->category_url_name] ) }}">
              @csrf
              @method("PUT")

                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input type="text" name="category_name"
                        class="form-control @error('category_name') alert-border @enderror"
                        id="category_name" maxlength="50"
                        value="{{ $data->category_name }}"
                        placeholder="Category name"
                        autocomplete="off">

                        @error('category_name')
                          <span class="laravel-alert">{{ $errors->first('category_name') }}</span>
                        @enderror

                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="category_url_name">Category Url Name (Example: category-four)</label>
                      <input type="text" name="category_url_name"
                        class="form-control @error('category_url_name') alert-border @enderror"
                        id="category_url_name" maxlength="50"
                        value="{{ $data->category_url_name }}"
                        placeholder="Category Url Name"
                        autocomplete="off">

                        @error('category_url_name')
                          <span class="laravel-alert">{{ $errors->first('category_url_name') }}</span>
                        @enderror

                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <div class="col">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" name="description"
                        class="form-control @error('description') alert-border @enderror"
                        id="description" maxlength="50"
                        value="{{ $data->description }}"
                        placeholder="Description"
                        autocomplete="off">

                        @error('description')
                          <span class="laravel-alert">{{ $errors->first('description') }}</span>
                        @enderror

                    </div>
                  </div>
                </div>

                <div class="btn-container mt-4">
                    <button type="submit" class="btn-default btn-form btn-green">Update</button>
                </div>

              </form>

              <p class="text-end pe-3 mb-4">
                <a href="{{ URL::previous() }}"
                  class="btn-default btn-form btn-white">Back
                </a>
              </p>

          </section>
        </div>
      </div> <!-- end 'content'-->
    </div>
  </div>
</x-app-layout>
