@extends('layouts.main')

@section('title', 'Produto')

@section('content')

@foreach($usuarios as $usuario)
    <p>{{ $usuario->name }} -- {{ $usuario->sobrenome }}</p>
@endforeach

@endsection