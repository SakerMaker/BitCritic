@extends('layouts.panelLayout')

@section('template_title')
    Panel Comentario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Comment</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('comments.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $comment->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Id Review:</strong>
                            {{ $comment->id_review }}
                        </div>
                        <div class="form-group">
                            <strong>Content:</strong>
                            {{ $comment->content }}
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
