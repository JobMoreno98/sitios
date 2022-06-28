@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row border-bottom shadow mb-3">
        <div class="col-sm-12">
            <h2 class="text-center">Todos nuestros Sitios</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($sitios as $sitio)
        <div class="col-sm-12 col-md-4 ">
            <div class="card h-100 shadow-sm m-1">
                <a class="btn btn-sm" href="{{ route('index', ['nombre' => $sitio->nombre]) }}">
                    <div class="card-body ">
                        <h2 class=" align-middle"> Ver {{ $sitio->nombre_view }}</h2>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection