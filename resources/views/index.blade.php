@extends('layouts.app')

{{-- Inclusion de barra de navegacion --}}
@section('nav')
    @include('layouts.nav')
@endsection
{{-- Inclusion de barra de slide principal --}}
@section('content')
    @include('layouts.slide')
@endsection
