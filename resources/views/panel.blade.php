@extends('layouts.app')

@section('content')
    <h1 class='text-center text-white'>SOLO ADMINS PUTOOO</h1>
    <form action="{{ route('games.resultados') }}" method="GET" class="text-center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-trash"></i> Games</button>
    </form>
@endsection
