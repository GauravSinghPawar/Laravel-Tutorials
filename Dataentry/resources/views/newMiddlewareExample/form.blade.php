@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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


                <div class="card-header">Enter Field Data</div>



                <div class="card-body">
                  <form method="POST" action="{{ route('form.submit') }}">
                      @csrf

                      <div class="form-group row">
                          <label for="field1" class="col-md-4 col-form-label text-md-right">Field1</label>

                          <div class="col-md-6">
                              <input id="field1" type="text" class="form-control @error('field1') is-invalid @enderror" name="field1" value="{{ old('field1') }}" required autocomplete="field1" autofocus>

                              @error('field1')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                              @enderror
                            </span>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="field2" class="col-md-4 col-form-label text-md-right">Field2</label>

                          <div class="col-md-6">
                              <input id="field2" type="text" class="form-control @error('field2') is-invalid @enderror" name="field2" value="{{ old('field2') }}" required autocomplete="field2" autofocus>

                              @error('field2')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                              @enderror
                            </span>
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
