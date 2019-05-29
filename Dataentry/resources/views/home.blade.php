@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">
      <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>DOB</th>
              <th>Company</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Subscribe</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $d)
              <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->dob }}</td>
                <td>{{ $d->company }}</td>
                <td>{{ $d->email }}</td>
                <td>{{ $d->phone }}</td>
                <td>{{ $d->address }}</td>
                @if($d->subscribe == 1)
                <td>Yes</td>
                @else
                <td>No</td>
                @endif

              </tr>
            @endforeach
          </tbody>
      </table>
      <div class="text-center">
          {!! $data->links(); !!}  
      </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                      <strong>Errors:</strong>
                      <ul>
                        @foreach($errors->all() as $error)

                          <li>{{ $error }}</li>

                        @endforeach
                      </ul>
                    </div>
                  @endif
                </div>


                <div class="card-header">Enter User Data</div>



                <div class="card-body">
                  <form method="POST" action="{{ route('data.store') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                          <div class="col-md-6">
                              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                              @enderror
                            </span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                          <div class="col-md-6">
                              <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                              @error('dob')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                              @enderror
                            </span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                          <div class="col-md-6">
                              <input id="company" type="text" class="form-control @error('name') is-invalid @enderror" name="company" value="{{ old('company') }}" required autocomplete="companuy" autofocus>

                              @error('company')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                              @enderror
                            </span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                              @enderror
                            </span>
                          </div>
                      </div>

                      <div class="form-group row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                        <div class="col-md-6">
                            <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            @enderror
                          </span>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <textarea id=""textarea class="form-control @error('address') is-invalid @enderror" name="address" required autocomplete="address" autofocus>
                                {{ old('address') }}
                            </textarea>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            @enderror
                          </span>
                        </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-6 offset-md-4">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" name="subscribe" id="subscribe" {{ old('subscribe') ? 'true' : 'false' }}>

                                  <label class="form-check-label" for="subscribe">
                                      {{ __('Subscribe') }}
                                  </label>
                              </div>
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Submit') }}
                              </button>

                          </div>
                      </div>


                  </form>
                </div>



            </div>
        </div>
    </div>
</div>
@endsection
