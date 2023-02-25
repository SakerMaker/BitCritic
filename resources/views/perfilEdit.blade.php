@extends('layouts.app')

@section('template_title')
    Editar Perfil - {{ $user->name }}
@endsection

@section('content')

<form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" enctype="multipart/form-data">
<section class="h-100 gradient-custom-2" style="min-height:75vh">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-12 col-xl-12">
          <div class="card">
            <div class="rounded-top text-white d-flex" style="background-color: #006ac7; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <div class="profile-pic img-fluid mt-4 mb-2">
                    <label class="-label" for="file">
                      <span class="glyphicon glyphicon-camera"></span>
                      <span>Cambiar Foto</span>
                    </label>
                    <input id="file" type="file" onchange="loadFile(event)"/>
                    <img src="{{ url($user->profile_photo_path) }}" id="output" width="200" />
                  </div>
                
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5>Usuario</h5>
                <p><i class="bi bi-geo-alt-fill"></i><input type="text" id="lugar" placeholder="Ubicación..." class="form-control w-75 d-inline-block mx-3" /></p>
              </div>
              <div class="text-right py-1 m-auto mr-0" style="margin-right:auto!important;">
                <div class="upload-btn-wrapper">
                    <button class="btn btn-outline-light btn-lg px-4">Cambiar Banner</button>
                    <input type="file" name="myfile" />
                  </div>
            </div>
            </div>
            <div class="card-body p-4 text-black mt-5">
              <div class="mb-5">
                <p class="lead fw-normal mb-1">Sobre Mí</p>
                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
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

</script>

@endsection
