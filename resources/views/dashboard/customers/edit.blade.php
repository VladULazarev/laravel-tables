<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit a customer</h2>
  </x-slot>

  <div class="py-12">
    <div class="edit-width mx-auto sm:px-6 lg:px-8">

      <div class="row content mb-5">
        <div class="col-lg-6">
          <section class="relative break-words p-3 mt-3">

            <form method="POST" action="{{ route('update-customer', [ 'data' => $data->last_name ] ) }}">
              @csrf
              @method("PUT")

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="first_name">Name</label>
                    <input type="text" name="first_name"
                      class="form-control @error('first_name') alert-border @enderror"
                      id="first_name" maxlength="50"
                      value="{{ $data->first_name }}"
                      placeholder="Name"
                      autocomplete="off">

                      @error('first_name')
                        <span class="laravel-alert">{{ $errors->first('first_name') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name"
                      class="form-control @error('last_name') alert-border @enderror"
                      id="last_name" maxlength="50"
                      value="{{ $data->last_name }}"
                      placeholder="Last name"
                      autocomplete="off">

                      @error('last_name')
                        <span class="laravel-alert">{{ $errors->first('last_name') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone"
                      class="form-control @error('phone') alert-border @enderror"
                      id="phone" maxlength="50"
                      value="{{ $data->phone }}"
                      placeholder="Phone"
                      autocomplete="off">

                      @error('phone')
                        <span class="laravel-alert">{{ $errors->first('phone') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"
                      class="form-control @error('email') alert-border @enderror"
                      id="email" maxlength="50"
                      value="{{ $data->email }}"
                      placeholder="Email"
                      autocomplete="off">

                      @error('email')
                        <span class="laravel-alert">{{ $errors->first('email') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address"
                      class="form-control @error('address') alert-border @enderror"
                      id="address" maxlength="200"
                      value="{{ $data->address }}"
                      placeholder="Address"
                      autocomplete="off">

                      @error('address')
                        <span class="laravel-alert">{{ $errors->first('address') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city"
                      class="form-control @error('city') alert-border @enderror"
                      id="city" maxlength="50"
                      value="{{ $data->city }}"
                      placeholder="City"
                      autocomplete="off">

                      @error('city')
                        <span class="laravel-alert">{{ $errors->first('city') }}</span>
                      @enderror

                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col">
                  <div class="form-group">
                    <label for="city">State</label>
                    <input type="text" name="state"
                      class="form-control @error('state') alert-border @enderror"
                      id="state" maxlength="50"
                      value="{{ $data->state }}"
                      placeholder="State"
                      autocomplete="off">

                      @error('state')
                        <span class="laravel-alert">{{ $errors->first('state') }}</span>
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
