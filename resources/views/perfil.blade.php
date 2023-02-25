@extends('layouts.app')

@section('template_title')
    Usuario - {{ $user->name }}
@endsection

@section('content')
<section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-12 col-xl-12">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #006ac7; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="{{url('img/sin-foto.png')}}"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; z-index: 1">
              @if (Auth::id()==$user->id)
                <a href="{{Request::url()."/edit"}}" type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                  style="z-index: 1;">
                  Editar Perfil
              </a>
              @endif
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5>Usuario</h5>
                <p><i class="bi bi-geo-alt-fill"></i> España</p>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5">0</p>
                  <p class="small text-muted mb-0">Reviews</p>
                </div>
                <div class="px-3">
                  <p class="mb-1 h5">0</p>
                  <p class="small text-muted mb-0">Likes</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black">
              <div class="mb-5">
                <p class="lead fw-normal mb-1">Sobre Mí</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">Web Developer</p>
                  <p class="font-italic mb-1">Lives in New York</p>
                  <p class="font-italic mb-0">Photographer</p>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Últimas Reviews</p>
                <p class="mb-0"><a href="#!" class="text-muted">Ver Todas</a></p>
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
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection
