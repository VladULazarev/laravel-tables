<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit an order</h2>
  </x-slot>

  <div class="py-12">
    <div class="edit-width mx-auto sm:px-6 lg:px-8">

      <div class="row content mb-5">
        <div class="col-lg-6">
          <section class="relative break-words p-3 mt-3">

            <form method="POST" action="{{ route('update-orders', [ 'data' => $data->order_id ] ) }}">
              @csrf
              @method("PUT")

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <input type="hidden" name="order_id"
                      class="form-control @error('order_id') alert-border @enderror"
                      id="order_id" maxlength="8"
                      value="{{ $data->order_id }}"
                      placeholder="Order Id"
                      autocomplete="off">

                      @error('order_id')
                        <span class="laravel-alert">{{ $errors->first('order_id') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="product_id">Product Id</label>
                    <input type="text" name="product_id"
                      class="form-control @error('product_id') alert-border @enderror"
                      id="product_id" maxlength="8"
                      value="{{ $data->product_id }}"
                      placeholder="Product Id"
                      autocomplete="off">

                      @error('product_id')
                        <span class="laravel-alert">{{ $errors->first('product_id') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="customer_id">Customer Id</label>
                    <input type="text" name="customer_id"
                      class="form-control @error('customer_id') alert-border @enderror"
                      id="customer_id" maxlength="8"
                      value="{{ $data->customer_id }}"
                      placeholder="Customer Id"
                      autocomplete="off">

                      @error('customer_id')
                        <span class="laravel-alert">{{ $errors->first('customer_id') }}</span>
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
                    <label for="total_sum">Total Sum</label>
                    <input type="text" name="total_sum"
                      class="form-control @error('total_sum') alert-border @enderror"
                      id="total_sum" maxlength="5"
                      value="{{ $data->total_sum }}"
                      placeholder="Total Sum"
                      autocomplete="off">

                      @error('total_sum')
                        <span class="laravel-alert">{{ $errors->first('total_sum') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="order_status_id">Status</label>

                    <select id="order_status_id" name="order_status_id" class="form-select form-control">
                      @foreach ($statuses as $status)
                          @if ($status->order_status_id == $data->order_status_id )
                          <option value="{{ $data->order_status_id }}">Current status - '{{ $status->order_status_name }}'</option>
                          @endif
                      @endforeach

                      @foreach ($statuses as $status)
                        <option value="{{ $status->order_status_id }}">{{ $status->order_status_name }}</option>
                      @endforeach
                    </select>

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea type="text" name="comments"
                      class="form-control @error('name') alert-border @enderror"
                      id="comments" maxlength="100"
                      value="{{ $data->comments }}"
                      placeholder="Comments"
                      autocomplete="off">{{ $data->comments }}</textarea>

                      @error('comments')
                        <span class="laravel-alert">{{ $errors->first('comments') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="shipped_date">Shipped</label>
                    <input type="text" name="shipped_date"
                      class="form-control @error('shipped_date') alert-border @enderror"
                      id="shipped_date" maxlength="10"
                      value="{{ $data->shipped_date }}"
                      placeholder="Enter shipping date like 2022-09-01, or leave it empty"
                      autocomplete="off">

                      @error('shipped_date')
                        <span class="laravel-alert">{{ $errors->first('shipped_date') }}</span>
                      @enderror

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
