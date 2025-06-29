@extends('layouts.base')

@section('title', 'Gestión CRUD')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/crud.css') }}">
@endsection

@section('content')
    @include('CRUD.crud')
@endsection
