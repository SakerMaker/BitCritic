@extends('layouts.app')

@section('template_title')
    Review - {{ $review->title }}
@endsection

@section('content')

<section class="py-5 text-white">
    <div class="container px-5 my-5">
        <div class="row gx-5">
            <div class="col-lg-3">
                <div class="d-flex align-items-center mt-lg-5 mb-4">
                    <a href="{{url("/perfil/".$user->id)}}"><img class="img-fluid rounded-circle align-baseline" style="width:50px!important;" src="{{url($user->profile_photo_path)}}" alt="..." /></a>
                    <div class="ms-3">
                        <div class="fw-bold"><a class="text-white" href="{{url("/perfil/".$user->id)}}">{{$user->name}}</a></div>
                        <div class="text-muted">{{$user->about_you}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">{{$review->title}}</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">{{substr($review->created_at,0,10)}}</div>
                        <!-- Post categories-->
                        <h4 class="fw-bold mb-1">Juego <a href="{{url("/games/".$game->id)}}" class="fw-bolder text-white">{{$game->title}}</h4>
                        <a class="badge bg-secondary text-decoration-none link-light">{{$game->genero}}</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4"><a href="{{url("/games/".$game->id)}}"><img class="img-fluid rounded" style="width:100%;height:300px;object-fit:cover;" src="{{url($game->image)}}" alt="..." /></a></figure>
                    <!-- Post content-->
                    <section class="mb-5" style="width:100%; word-wrap: break-word;">
                        <p class="fs-5 mb-4">{{$review->content}}</p>
                        @if ($user->id==Auth::id())
                        <form action="{{ route('reviews.destroy',$review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white btn btn-secondary" style="float:right!important;"><i class="fa fa-fw fa-trash"></i> Borrar Review</button>
                        </form>
                        @else
                        @endif
                    </section>
                    
                </article>
                
                <!-- Comments section-->
                <section>
                    {{-- <div class="card bg-light text-dark">
                        <div class="card-body">
                            <!-- Comment form-->
                            <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                            <!-- Comment with nested comments-->
                            <div class="d-flex mb-4">
                                <!-- Parent comment-->
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                    <!-- Child comment 1-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                        </div>
                                    </div>
                                    <!-- Child comment 2-->
                                    <div class="d-flex mt-4">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            When you put money directly to a problem, it makes a good headline.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Single comment-->
                            <div class="d-flex">
                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                <div class="ms-3">
                                    <div class="fw-bold">Commenter Name</div>
                                    When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                    <h1 class="text-white mt-5 mb-4">Comentarios</h1>
          <div class="card bg-light">
            
              <div class="card-body text-dark p-5 ">
                  <!-- Comment form-->
                  @includeif('partials.errors')
                  <form method="POST" action="{{ route('comments.store') }}"  role="form" class="mb-4" enctype="multipart/form-data">
                    @csrf

                    {{ Form::hidden('id_user', Auth::id()) }}
                    {{ Form::hidden('id_review', $review->id) }}
                    {{ Form::textarea('content', "", ['class' => 'form-control mb-4' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Escribe tu comentario']) }}
                    {!! $errors->first('content', '<div class="invalid-feedback">:message</div>') !!}
                    
                    <button type="submit" class="btn btn-lg btn-primary mt-4 mb-4">Escribir comentario</button>
                </form>
                  <!-- Comment with nested comments-->
                  @foreach ($users as $user_comment)
                    
                    <div class="d-flex mb-4">
                        <!-- Parent comment-->
                        <a href={{url("/perfil/".$user_comment[0]->id)}}><div class="flex-shrink-0"><img class="rounded-circle" src="{{ url($user_comment[0]->profile_photo_path) }}" alt="..." style="width:50px"/></div></a>
                        <div class="ms-3" style="word-wrap: break-word;width:85%;">
                        
                            <div class="fw-bold">Comentario &middot; by <a href={{url("/perfil/".$user_comment[0]->id)}}>{{$user_comment[0]->name}}</a> &middot; {{substr($user_comment[0]->created_at,0,10)}}</div>
                            <p>{{$user_comment[0]->comment_content}}</p>
                            @if ($user_comment[0]->id==Auth::id())
                                <form action="{{ route('comments.destroy',$user_comment[0]->id_commnent) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white btn btn-secondary" style="float:right!important;"><i class="fa fa-fw fa-trash"></i> Borrar Comentario</button>
                                </form>
                            @else
                            @endif
                            <br>
                        
                        </div>
                    </div>
                  @endforeach
                  
              </div>
          </div>
                </section>
            </div>
        </div>
    </div>
</section>
</main>

@endsection