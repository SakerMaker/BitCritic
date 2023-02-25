@extends('layouts.app')

@section('template_title')
    Usuario - {{ $user->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $user->name }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $user->email }}
                        </div>
                        <div class="form-group">
                            <strong>Location:</strong>
                            {{ $user->location }}
                        </div>
                        <div class="form-group">
                            <strong>Profile photo path:</strong>
                            {{ $user->profile_photo_path }}
                        </div>
                        <div class="form-group">
                            <strong>Banner photo path:</strong>
                            {{ $user->banner_photo_path }}
                        </div>
                        <div class="form-group">
                            <strong>About you:</strong>
                            {{ $user->about_you }}
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
