<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create a new order</h2>
  </x-slot>

  <div class="py-12">
    <div class="edit-width mx-auto sm:px-6 lg:px-8">

      <div class="row content mb-5">
        <div class="col-lg-6">
          <section class="relative break-words p-3 mt-3">

            <form method="POST" action="{{ route('store-orders') }}">
              @csrf

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="product_id">Product Id</label>
                    <input type="text" name="product_id"
                      class="form-control @error('product_id') alert-border @enderror"
                      id="product_id" maxlength="8"
                      value="{{ old('product_id') }}"
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
                      value="{{ old('customer_id') }}"
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
                        <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                      @endforeach

                    </select>

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <input type="hidden" name="order_date"
                      class="form-control @error('order_date') alert-border @enderror"
                      id="order_date" maxlength="10"
                      value="{{ date($format = 'Y-m-d') }}">

                      @error('order_date')
                        <span class="laravel-alert">{{ $errors->first('order_date') }}</span>
                      @enderror

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
                      value="{{ old('total_sum') }}"
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
                        <option value="{{ $status->order_status_id }}"
                          @if ($status->order_status_name == 'Accepted') selected @endif>
                          {{ $status->order_status_name }}
                        </option>
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
                      class="form-control @error('comments') alert-border @enderror"
                      id="comments" maxlength="100"
                      value="{{ old('comments') }}"
                      placeholder="Comments"
                      autocomplete="off">{{ old('comments') }}</textarea>

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
                      value="{{ old('shipped_date') }}"
                      placeholder="Enter shipping date like 2022-09-01, or leave it empty"
                      autocomplete="off">

                      @error('shipped_date')
                        <span class="laravel-alert">{{ $errors->first('shipped_date') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="btn-container mt-4">
                  <button type="submit" class="btn-default btn-form btn-green">Create</button>
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
