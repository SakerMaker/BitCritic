@extends('layouts.app')

@section('content')

<div class="px-4 py-5 px-md-5 text-center text-lg-start d-flex align-items-center justify-content-center bg-dark" style="background-color: hsl(0, 0%, 96%);min-height:75vh;">
    <div class="container">
      <div class="row gx-lg-5 align-items-center mt-10">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight text-white">
            ¿No recuerdas <br />
            <span class="text-primary">tu contraseña?</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Te enviamos un enlace al correo que nos proporciones para que puedas cambiar la contraseña a una nueva.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email input -->
                <div class="form-outline mb-4 form-floating">
                    <input id="email" type="email" class="form-control bg-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  <label class="form-label" for="email">{{ __('Correo Electrónico') }}</label>
                </div>

                <div class="row mb-0">
                    <div>
                        <button type="submit" class="btn btn-primary btn-block mb-4 d-block w-100 p-3">
                            {{ __('Recuperar Contraseña') }}
                        </button>
                    </div>
                </div>

                <p class="m-0">
                  <a href="{{ url('/register') }}">Aún no tengo cuenta</a>
                </p>
                <p class="m-0 mt-4 mr-auto">
                  <a href="{{ URL::previous() }}" class="bg-dark p-3 text-white btn text-decoration-none d-inline-block float-right" style="float:right;">Volver</a>
                </p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
