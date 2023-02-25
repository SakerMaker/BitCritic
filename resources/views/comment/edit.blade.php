@extends('layouts.app')

@section('template_title')
    Editar Comentario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Comment</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            @method('PUT')
                            @include('comment.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
