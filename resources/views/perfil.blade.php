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
            <div class="rounded-top text-white d-flex flex-row" style="background: url('{{url($user->banner_photo_path)}}'); height:200px; background-size:cover;background-position:center center;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="{{url($user->profile_photo_path)}}"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; height:150px;z-index: 1">
              @if (Auth::id()==$user->id)
                <a href="{{Request::url()."/edit"}}" type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                  style="z-index: 1;">
                  Editar Perfil
              </a>
              @endif
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5>{{$user->name}}</h5>
                <p><i class="bi bi-geo-alt-fill"></i> {{$user->location}}</p>
              </div>
            </div>
            <div class="p-4 text-black" style="background-color: #f8f9fa;">
              <div class="d-flex justify-content-end text-center py-1">
                <div>
                  <p class="mb-1 h5">{{$reviews}}</p>
                  <p class="small text-muted mb-0">Reviews</p>
                </div>
                {{-- <div class="ps-3">
                  <p class="mb-1 h5">{{$like}}</p>
                  <p class="small text-muted mb-0">Likes</p>
                </div> --}}
                <div class="px-3">
                  <p class="mb-1 h5">{{$comment}}</p>
                  <p class="small text-muted mb-0">Comentarios</p>
                </div>
              </div>
            </div>
            <div class="card-body p-4 text-black">
              <div class="mb-5">
                <p class="lead fw-normal mb-1">Sobre Mí</p>
                <div class="p-4" style="background-color: #f8f9fa;">
                  <p class="font-italic mb-1">{{$user->about_you}}</p>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="lead fw-normal mb-0">Últimas Reviews</p>
                
              </div>
              <div class="row gx-5">
                @foreach ($allreviews as $single_review)
                <div class="col-lg-4 mb-5 fill-div">
                  <a href="{{url("/reviews/") . "/" .$single_review[0]->id_review}}" class="fill-div-link"></a>
                  <div class="card h-100 shadow border-0">
                    <div style="position:relative;overflow:hidden;padding-bottom:100%;">
                      <img class="img img-responsive full-width" style="position:absolute;width:100%;" src="{{url($single_review[0]->game_image)}}" alt="..." />
                    </div>
                    <div class="card-body p-4">
                      <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$single_review[0]->game_genero}}</div>
                      <a class="text-decoration-none link-dark stretched-link" href="#!">
                        <h5 class="card-title mb-3">{{$single_review[0]->review_title}}</h5>
                      </a>

                      <p class="card-text mb-0">
                        @if (strlen($single_review[0]->review_content)>100)
                        {{substr($single_review[0]->review_content,0,100)}}...
                      @else
                        {{$single_review[0]->review_content}}
                      @endif  </p>
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                      <div class="d-flex align-items-end justify-content-between">
                        <div class="d-flex align-items-center">
                          <div class="small">
                            <div class="fw-bold"><span class="fw-bolder">Juego: </span>{{$single_review[0]->game_title}}</div>
                            <div class="text-muted">{{substr($single_review[0]->created_at,0,10)}} &middot; by {{$user->name}}</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection
