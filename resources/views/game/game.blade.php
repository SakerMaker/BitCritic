@extends('layouts.app')

@section('template_title')
    Juego 
@endsection

@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center text-white">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ url($games->image)}}" alt="..." /></div>
            <div class="col-md-6">
              <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                <h1 class="display-5 fw-bolder">{{$games->title}}</h1>
                <div class="fs-5 mb-5">
                    <span>&middot; {{$review}} reviews</span>
                </div>
                <p class="lead">{{$games->description}}</p>
                <div class="d-flex">
                    <a class="btn btn-outline-light flex-shrink-0" type="button" href="#reviews">
                        <i class="bi bi-star me-1"></i>
                        Poner Review
                    </a>
                </div>
            </div>
        </div>
        <section id="reviews">
          <h1 class="text-white mt-5">Reviews</h1>
          <div class="card bg-light">
              <div class="card-body text-dark p-5">
                  <!-- Comment form-->
                  <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Escribe tu review"></textarea></form>
                  <!-- Comment with nested comments-->
                  @foreach ($reviews as $single_review)
                    <div class="d-flex mb-4">
                        <!-- Parent comment-->
                        <div class="flex-shrink-0"><img class="rounded-circle" src="{{ url($single_review[0]->profile_photo_path) }}" alt="..." style="width:50px"/></div>
                        <div class="ms-3">
                        
                            <div class="fw-bold"><span class="fw-bolder">{{$single_review[0]->review_title}}</span> &middot; by {{$single_review[0]->name}} &middot; {{substr($single_review[0]->created_at,0,10)}}</div>
                            {{$single_review[0]->review_content}}<br>
                            
                        
                        </div>
                    </div>
                  @endforeach
                  
              </div>
          </div>
      </section>
    </div>
    
</section>

<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Juegos Relacionados</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Fancy Product</h5>
                            <!-- Product price-->
                            Estrellas
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Juego</a></div>
                    </div>
                </div>
            </div>
            <div class="col mb-5">
              <div class="card h-100">
                  <!-- Product image-->
                  <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                  <!-- Product details-->
                  <div class="card-body p-4">
                      <div class="text-center">
                          <!-- Product name-->
                          <h5 class="fw-bolder">Fancy Product</h5>
                          <!-- Product price-->
                          Estrellas
                      </div>
                  </div>
                  <!-- Product actions-->
                  <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                      <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Juego</a></div>
                  </div>
              </div>
          </div>
          <div class="col mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder">Fancy Product</h5>
                        <!-- Product price-->
                        Estrellas
                    </div>
                </div>
                <!-- Product actions-->
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Juego</a></div>
                </div>
            </div>
        </div>
        <div class="col mb-5">
          <div class="card h-100">
              <!-- Product image-->
              <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
              <!-- Product details-->
              <div class="card-body p-4">
                  <div class="text-center">
                      <!-- Product name-->
                      <h5 class="fw-bolder">Fancy Product</h5>
                      <!-- Product price-->
                      Estrellas
                  </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                  <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Ver Juego</a></div>
              </div>
          </div>
      </div>
        </div>
    </div>
</section>
@endsection
