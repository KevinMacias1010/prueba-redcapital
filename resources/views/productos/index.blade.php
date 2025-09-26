@php($title = 'Productos')
@extends('layouts.app')

@section('content')
    @include('productos.partials.index_content', ['productos' => $productos])
@endsection

