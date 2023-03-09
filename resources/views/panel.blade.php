@extends('layouts.app')

@section('template_title')
    Panel de Administración
@endsection

@section('content')
<section class="bg-dark py-5">
    <div class="container d-flex justify-content-center align-items-center">
        <form action="{{ route('users.index') }}" method="GET" class="px-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Users</button>
        </form>
        <form action="{{ route('games.panelIndex') }}" method="GET" class="px-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Games</button>
        </form>
        <form action="{{ route('reviews.index') }}" method="GET" class="px-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Reviews</button>
        </form>
        <form action="{{ route('comments.index') }}" method="GET" class="px-3">
            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Comments</button>
        </form>
    </div>
</section>
@endsection
