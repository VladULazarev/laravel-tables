<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit a product</h2>
  </x-slot>

  <div class="py-12">
    <div class="edit-width mx-auto sm:px-6 lg:px-8">

      <div class="row content mb-5">
        <div class="col-lg-6">
          <section class="relative break-words p-3 mt-3">

            <form method="POST" action="{{ route('update-products', [ 'data' => $data->product_url_name ] ) }}">
              @csrf
              @method("PUT")

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="name">Product name</label>
                    <input type="text" name="name"
                      class="form-control @error('name') alert-border @enderror"
                      id="name" maxlength="50"
                      value="{{ $data->name }}"
                      placeholder="Name"
                      autocomplete="off">

                      @error('name')
                        <span class="laravel-alert">{{ $errors->first('name') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="product_url_name">Product url name (Example: product-name)</label>
                    <input type="text" name="product_url_name"
                      class="form-control @error('product_url_name') alert-border @enderror"
                      id="product_url_name" maxlength="50"
                      value="{{ $data->product_url_name }}"
                      placeholder="Product url name"
                      autocomplete="off">

                      @error('product_url_name')
                        <span class="laravel-alert">{{ $errors->first('product_url_name') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="category_id">Category</label>

                    <select id="category_id" name="category_id" class="form-select form-control">
                      @foreach ($categories as $category)
                          @if ($category->category_id == $data->category_id )
                          <option value="{{ $data->category_id }}">Current category - '{{ $category->category_name }}'</option>
                          @endif
                      @endforeach

                      @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="quantity">Quantity in stock</label>
                    <input type="text" name="quantity"
                      class="form-control @error('quantity') alert-border @enderror"
                      id="quantity" maxlength="8"
                      value="{{ $data->quantity }}"
                      placeholder="Quantity"
                      autocomplete="off">

                      @error('quantity')
                        <span class="laravel-alert">{{ $errors->first('quantity') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="unit_price">Unit price</label>
                    <input type="text" name="unit_price"
                      class="form-control @error('unit_price') alert-border @enderror"
                      id="unit_price" maxlength="8"
                      value="{{ $data->unit_price }}"
                      placeholder="Unit price"
                      autocomplete="off">

                      @error('unit_price')
                        <span class="laravel-alert">{{ $errors->first('unit_price') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="status_id">Status</label>

                    <select id="status_id" name="status_id" class="form-select form-control">
                      @foreach ($statuses as $status)
                          @if ($status->status_id == $data->status_id )
                          <option value="{{ $data->status_id }}">Current status - '{{ $status->status_name }}'</option>
                          @endif
                      @endforeach

                      @foreach ($statuses as $status)
                        <option value="{{ $status->status_id }}">{{ $status->status_name }}</option>
                      @endforeach
                    </select>

                  </div>
                </div>
              </div>

              <div class="btn-container mt-4">
                  <button type="submit" class="btn-default btn-form btn-green">Update</button>
              </div>

            </form>

            <p class="text-end pe-3 mb-4">
              <a href="{{ URL::previous() }}" class="btn-default btn-form btn-white">Back</a>
            </p>

          </section>
        </div>
      </div> <!-- end 'content'-->
    </div>
  </div>
</x-app-layout>
