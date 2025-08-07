@extends('layouts.app')

@push('head')
<title>{{ $producto->nombre }} - GORDO'S HOUSE</title>
<meta name="description" content="{{ Str::limit($producto->descripcion, 160) }}">
<meta name="keywords" content="muebles, {{ $producto->nombre }}, {{ $producto->categoria ?? '' }}, diseño, hogar">

@endpush

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 ">
            <img
                src="{{ asset('storage/' . $producto->image_path) }}"
                class="img-fluid rounded"
                alt="{{ $producto->nombre }}">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2 class="mb-3">{{ $producto->nombre }}</h2>
            <hr class="my-5">
            <p class="text-muted mb-3">
            <p class="lead">{{ $producto->descripcion }}</p>

            {{-- Botón que abre el modal de opciones --}}
            <button
                class="btn btn-success btn-lg mt-3"
                data-bs-toggle="modal"
                data-bs-target="#opcionesConsulta">
                Consulta por el tuyo¡
            </button>

            <a
                href="{{ route('home') }}"
                class="btn btn-secondary btn-lg mt-3 ms-2">
                Volver a nuestros productos
            </a>
        </div>
    </div>
</div>

{{-- Modal 1: Elige medio de contacto --}}
<div
    class="modal fade"
    id="opcionesConsulta"
    tabindex="-1"
    aria-labelledby="labelOpciones"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="labelOpciones">
                    Elige tu medio de contacto
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body d-grid gap-2">
                <a
                    href="https://wa.me/56950148342?text=Hola,%20estoy%20interesado%20en%20el%20producto%20{{ urlencode($producto->nombre) }}"
                    target="_blank"
                    class="btn btn-success">
                    WhatsApp
                </a>

                <a href="{{ route('contact.form', ['product_id' => $producto->id]) }}" class="btn btn-primary">
                    Formulario de Contacto
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
