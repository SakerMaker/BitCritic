@extends('layouts.app')

@section('content')

<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" height="400px" src="img/carrousel1.png" aria-hidden="true"
          focusable="false" style="object-fit: cover;">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1 class="fw-bold">Juegos del Mes</h1>
            <p class="fw-normal">Descubre cuáles son los juegos mejor valorados del mes.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Descubrir</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="400px" src="img/carrousel2.png" aria-hidden="true"
          focusable="false" style="object-fit: cover;">
        <div class="container">
          <div class="carousel-caption">
            <h1 class="fw-bold">Juegos Recientes</h1>
            <p class="fw-normal">Descubre lo que opina la gente de las novedades del gaming.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Descubrir</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img" width="100%" height="400px" src="img/carrousel3.png" aria-hidden="true"
          focusable="false" style="object-fit: cover;">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1 class="fw-bold">Reviews del Día</h1>
            <p class="fw-normal">Encuentra las reviews más votadas del mes.</p>
            <p><a class="btn btn-lg btn-primary" href="#">Ver Reviews</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>

  <header class="bg-dark py-5">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
          <div class="my-5 text-center text-xl-start">
            <h1 class="display-5 fw-bold text-white mb-2">Escucha la comunidad, únete a la comunidad</h1>
            <p class="lead fw-normal text-white-50 mb-4">Lee todas las opiniones y reviews de la gente sobre tus juegos
              favoritos y aporta tu crítica para que todo el mundo la vea.</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
              <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Opinar</a>
              <a class="btn btn-outline-light btn-lg px-4" href="#!">Leer Opiniones</a>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="img/main1.png"
            alt="..." /></div>
      </div>
    </div>
  </header>
  <section class="bg-body py-5">
    <div class="container px-5 my-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-8 col-xl-6">
          <div class="text-center text-dark">
            <h2 class="fw-bolder">Críticas de la Semana</h2>
            <p class="lead fw-normal mb-5">Lee las críticas más valoradas de esta semana.</p>
          </div>
        </div>
      </div>
      <div class="row gx-5">
        <div class="col-lg-4 mb-5">
          <div class="card h-100 shadow border-0">
            <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
            <div class="card-body p-4">
              <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
              <a class="text-decoration-none link-dark stretched-link" href="#!">
                <h5 class="card-title mb-3">Blog post title</h5>
              </a>
              <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the
                card's content.</p>
            </div>
            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
              <div class="d-flex align-items-end justify-content-between">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                  <div class="small">
                    <div class="fw-bold">Kelly Rowan</div>
                    <div class="text-muted">March 12, 2022 &middot; 6 likes</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card h-100 shadow border-0">
            <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
            <div class="card-body p-4">
              <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
              <a class="text-decoration-none link-dark stretched-link" href="#!">
                <h5 class="card-title mb-3">Another blog post title</h5>
              </a>
              <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some
                quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
              <div class="d-flex align-items-end justify-content-between">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                  <div class="small">
                    <div class="fw-bold">Josiah Barclay</div>
                    <div class="text-muted">March 23, 2022 &middot; 6 likes</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-5">
          <div class="card h-100 shadow border-0">
            <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
            <div class="card-body p-4">
              <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
              <a class="text-decoration-none link-dark stretched-link" href="#!">
                <h5 class="card-title mb-3">The last blog post title is a little bit longer than the others</h5>
              </a>
              <p class="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of
                the card's content.</p>
            </div>
            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
              <div class="d-flex align-items-end justify-content-between">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                  <div class="small">
                    <div class="fw-bold">Evelyn Martinez</div>
                    <div class="text-muted">April 2, 2022 &middot; 6 likes</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
