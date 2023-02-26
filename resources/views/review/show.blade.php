@extends('layouts.panelLayout')

@section('template_title')
    Review - {{ $review->title }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Review</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('reviews.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Game:</strong>
                            {{ $review->id_game }}
                        </div>
                        <div class="form-group">
                            <strong>Id User:</strong>
                            {{ $review->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Title:</strong>
                            {{ $review->title }}
                        </div>
                        <div class="form-group">
                            <strong>Content:</strong>
                            {{ $review->content }}
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
