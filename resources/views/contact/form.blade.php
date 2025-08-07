@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('components.contact-form', ['producto' => $producto ?? null])
    </div>
@endsection