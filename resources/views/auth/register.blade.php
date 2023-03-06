@extends('layouts.app')

@section('template_title')
    Registro
@endsection

@section('content')
<div class="px-4 py-5 px-md-5 text-center text-lg-start d-flex align-items-center justify-content-center bg-dark" style="background-color: hsl(0, 0%, 96%);min-height:75vh;">
    <div class="container">
      <div class="row gx-lg-5 align-items-center mt-10">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight text-white">
            Únete hoy <br />
            <span class="text-primary">a la comunidad</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Escribe, comenta y valora reviews de todos los videojuegos que se te puedan ocurrir. Todas las reviews son revisadas para que el contenido de la web sea lo más legítimo y real posible.
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
             <form method="POST" action="{{ route('register') }}">
                @csrf
               <!-- Text input -->
               <div class="form-outline mb-4 form-floating">
                   <input id="name" type="text" class="form-control bg-white @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <label class="form-label" for="name">{{ __('Nombre') }}</label>

                        
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4 form-floating">
                    <input id="email" type="email" class="form-control bg-white @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  <label class="form-label" for="email">{{ __('Email Address') }}</label>
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                    


                <!-- Password input -->
                <div class="form-outline mb-4 form-floating">
                  <input id="password" type="password" class="form-control bg-white @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  <label class="form-label" for="password">{{ __('Contraseña') }}</label>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-outline mb-4 form-floating">
                    <input id="password-confirm" type="password" class="form-control bg-white" name="password_confirmation" required autocomplete="new-password">
                    <label class="form-label" for="password">{{ __('Confirmar Contraseña') }}</label>
                </div>



                <!-- Checkbox -->
                <div class="form-check d-flex mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Suscribirse a nuestro boletín de noticias
                  </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4 d-block w-100 p-3">
                    {{ __('Registrarse') }}
                </button>
                
                <p class="m-0">
                  <a href="{{ url("/login")}}">Ya tengo cuenta</a>
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

