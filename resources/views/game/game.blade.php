@extends('layouts.app')

@section('template_title')
    Juego {{$games->title}}
@endsection

@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center text-white">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ url($games->image)}}" alt="..." /></div>
            <div class="col-md-6">
              <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{$games->genero}}</div>
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
            <h1 class="text-white mt-5 mb-4">Escribe tu Review</h1>
          <div class="card bg-light">
            @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
            @endif
              <div class="card-body text-dark p-5 ">
                  <!-- Comment form-->
                  @includeif('partials.errors')
                  <form method="POST" action="{{ route('reviews.store') }}"  role="form" class="mb-4" enctype="multipart/form-data">
                    @csrf
                    {{ Form::hidden('reviewUsuario', true) }}
                    {{ Form::hidden('id_game', $games->id) }}
                    {{ Form::hidden('id_user', Auth::id()) }}
                    {{ Form::text('title', "", ['class' => 'form-control mb-4' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Título de la Review']) }}
                    {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                    {{ Form::textarea('content', "", ['class' => 'form-control mb-4' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Escribe tu review']) }}
                    {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
                    
                    <button type="submit" class="btn btn-lg btn-primary mt-4 mb-4">Escribir review</button>
                </form>
                <h1 class="text-dark mt-5 mb-4">Reviews</h1>
                  <!-- Comment with nested comments-->
                  @foreach ($reviews as $single_review)
                    
                    <div class="d-flex mb-4">
                        <!-- Parent comment-->
                        <a href={{url("/perfil/".$single_review[0]->id)}}><div class="flex-shrink-0"><img class="rounded-circle" src="{{ url($single_review[0]->profile_photo_path) }}" alt="..." style="width:50px;height:50px;object-fit:cover;"/></div></a>
                        <div class="ms-3">
                        
                            <div class="fw-bold"><span class="fw-bolder">{{$single_review[0]->review_title}}</span> &middot; by <a href={{url("/perfil/".$single_review[0]->id)}}>{{$single_review[0]->name}}</a> &middot; {{substr($single_review[0]->created_at,0,10)}}</div>
                            @if (strlen($single_review[0]->review_content)>100)
                                {{substr($single_review[0]->review_content,0,100)}}...
                            @else
                                {{substr($single_review[0]->review_content,0,100)}}
                            @endif
                            <br>
                            <a class="text-secondary" href="{{url("/reviews/".$single_review[0]->id_review)}}">Ver review</a>
                        
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
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-start">
            @foreach ($related as $related_game)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{ url($related_game->image) }}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{ $related_game->title }}</h5>
                            <!-- Product price-->
                           
                            @if (strlen($related_game->description)>100)
                                {{substr($related_game->description,0,100)}}...
                            @else
                                {{$related_game->description}}
                            @endif
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{url("/games/".$related_game->id)}}">Ver Juego</a></div>
                    </div>
                </div>
            </div>
            @endforeach
            @if ($related->count() == 0)
            <h5 class="fw-bolder mb-4">Parece que aún no hay juegos similares...</h5>
            @endif
            
        </div>
    </div>
</section>
@endsection
