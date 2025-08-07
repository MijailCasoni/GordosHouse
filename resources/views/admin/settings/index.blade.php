@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Configuración del Banner</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="banner_title" class="form-label">Título del Banner</label>
            <input type="text" name="banner_title" id="banner_title" class="form-control" value="{{ $settings['banner_title'] ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="banner_subtitle" class="form-label">Subtítulo del Banner</label>
            <input type="text" name="banner_subtitle" id="banner_subtitle" class="form-control" value="{{ $settings['banner_subtitle'] ?? '' }}" required>
        </div>
        <div class="mb-3">
            <label for="banner_image" class="form-label">Imagen del Banner</label>
            <input type="file" name="banner_image" id="banner_image" class="form-control">
            @if(isset($settings['banner_image']) && $settings['banner_image'])
                <img src="{{ asset('storage/' . $settings['banner_image']) }}" alt="Banner Actual" class="img-thumbnail mt-2" width="200">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Configuración</button>
    </form>
</div>
@endsection
