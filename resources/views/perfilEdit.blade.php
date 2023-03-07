@extends('layouts.app')

@section('template_title')
    Editar Perfil - {{ $user->name }}
@endsection

@section('content')

@includeif('partials.errors')

<form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
  {{ method_field('PATCH') }}
  @csrf
  @method('PUT')
  <div class="form-group">
    {{ Form::hidden('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::hidden('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::hidden('password', $user->password, ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Password']) }}
    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
</div>
<section class="h-100 gradient-custom-2" style="min-height:75vh">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-12 col-xl-12">
          <div class="card">
            <div class="rounded-top text-white d-flex" id="output2" style="background: url('{{url($user->banner_photo_path)}}'); height:200px;background-size:cover;background-position:center center;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;min-height:150px;">
                <div class="profile-pic img-fluid mt-4 mb-2">
                    <label class="-label" for="file">
                      <span class="glyphicon glyphicon-camera"></span>
                      <span>Cambiar Foto</span>
                    </label>
                    
                      <input type="file" name="profile_photo_path"  id="file" onchange="loadFile(event)">
                      <img src="{{ url($user->profile_photo_path) }}" id="output" width="200" />
                    
                  </div>
                
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5>{{$user->name}}</h5>
                <p><i class="bi bi-geo-alt-fill"></i>
                
                  {{ Form::text('location', $user->location, ['class' => 'form-control w-75 d-inline-block mx-3' . ($errors->has('location') ? ' is-invalid' : ''), 'placeholder' => 'Ubicación...']) }}
                  {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
              </p>
              </div>
              <div class="text-right py-1 m-auto mr-0 overflow-hidden" style="margin-right:auto!important;">
                <div class="upload-btn-wrapper">
                    <button class="btn btn-light btn-lg px-4">Cambiar Banner</button>
                    <input type="file" name="banner_photo_path" id="file" onchange="loadFileBanner(event)">
                    <span class="text-danger">{{ $errors->first('banner_photo_path') }}</span>
                  </div>
             </div>
            </div>
            <div class="card-body p-4 text-black mt-5">
              <div class="mb-5">
                <p class="lead fw-normal mb-1">Sobre Mí</p>
                {{ Form::textarea('about_you', $user->about_you, ['class' => 'form-control' . ($errors->has('about_you') ? ' is-invalid' : ''), 'placeholder' => 'Escribe sobre ti...']) }}
                {!! $errors->first('about_you', '<div class="invalid-feedback">:message</div>') !!}
              </div>
              <div class="p-4 text-black">
                <div class="d-flex justify-content-end text-center py-1">
                  <button type="submit" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;">
                    Guardar Cambios
                  </button>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
  


</form>

<script>
var loadFile = function (event) {
var image = document.getElementById("output");
image.src = URL.createObjectURL(event.target.files[0]);
};

var loadFileBanner = function (event) {
var image2 = document.getElementById("output2");
image2.style.background = "url("+URL.createObjectURL(event.target.files[0])+")";
};

</script>


@endsection
