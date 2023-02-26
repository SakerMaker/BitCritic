@extends('layouts.panelLayout')

@section('template_title')
    Juego - {{ $game->title }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Game</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('games.panelIndex') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $game->title }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $game->description }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $game->image }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha salida:</strong>
                            {{ $game->fecha_salida }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $game->genero }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
