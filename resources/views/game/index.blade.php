@extends('layouts.app')

@section('template_title')
    Juegos
@endsection

@section('content')

<header class="bg-dark py-5">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
          <div class="my-5 text-center text-xl-start">
            <h1 class="display-5 fw-bold text-white mb-2">Encuentra el juego que buscas</h1>
            <p class="lead fw-normal text-white-50 mb-4">Ponemos a tu disposición todos los juegos que existen para que puedas opinar sobre ellos en nuestra web.</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
              <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#search">Buscar</a>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="{{ url("img/main1.png") }}"
            alt="..." /></div>
      </div>
    </div>
  </header>
  <section class="bg-body py-5" id="search">
    <div class="container px-5 my-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="text-center text-dark">
            <h2 class="fw-bolder mb-5">Juegos Más Valorados</h2>
          </div>
        </div>
      </div>
      
      <div class="row gx-5">
        <div class="mt-1 mb-4">
              <form action="{{ route('games.search') }}" method="GET">
                  

                  
                <div class="flex form-outline mb-4 form-floating col-lg-3 col-md-9 ms-auto">
                  <input class="form-control bg-white" type="text" placeholder="Búsqueda..." name="s">
                  <label class="form-check-label mb-4" for="search">
                    {{ __('Búsqueda...') }}
                  </label>
                  <button type="submit" class="btn btn-primary mb-4 p-2 d-block ms-auto">
                    {{ __('Buscar') }}
                  </button>
                </div>
              </form>
        </div>
      {{-- @foreach ($games as $game)
          {{$game}}
      @endforeach --}}
      @foreach ($games as $game)
            
              <div class="col-lg-3 mb-5 fill-div">
                
                <div class="card shadow border-0"  style="min-height:450px;">
                  <a href="{{url("/games") . "/" .$game->id}}" class="fill-div-link"></a>
                  <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                  <div class="card-body p-4">
                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $game->genero }}</div>
                    <a class="text-decoration-none link-dark stretched-link" href="#!">
                      <h5 class="card-title mb-3">{{ $game->title }}</h5>
                    </a>
                    <p class="card-text mb-0">
                      @if (strlen($game->description)>100)
                        {{substr($game->description,-100)}}...
                      @else
                        {{$game->description}}
                      @endif
                    </p>
                  </div>
                  <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-end justify-content-between">
                      <div class="d-flex align-items-center">
                        <div class="small">
                          <div class="fw-bold">{{$game->count}} reviews</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        @endforeach
        {!! $games->links() !!}
      <div>
        
      
      
      {{-- <div class="text-center mx-auto w-100">
        <nav aria-label="Page navigation example" class="mx-auto p-0 d-inline-block">
            <ul class="pagination mx-auto">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
      </div> --}}

      

    </div>
    
    
  </section>
  
    </main>
    
    <section class="py-5 bg-dark">
      <div class="container px-5 my">
        <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
          <div
            class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
            <div class="mb-4 mb-xl-0">
              <div class="fs-3 fw-bold text-white">Empieza a escribir tu review ya.</div>
              <div class="text-white-50">Comparte tus opiniones con toda la comunidad.</div>
            </div>
            <div class="ms-xl-4">
              <div class="input-group mb-2">
                <a class="btn btn-outline-light btn-lg col-12 px-4" href="#!">Escribir Review</a>
              </div>
              <div class="small text-white-50">Todo lo que compartas será revisado por moderadores.</div>
            </div>
          </div>
        </aside>
      </div>
    </section>

@endsection
