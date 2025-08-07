{{-- Partial: sólo el formulario con tus clases y estilos --}}

<div class="card-contact mb-5">
    <h2 class="text-center mb-5">{{ $titulo ?? 'Contáctanos' }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Errores de validación --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="contact-form" action="{{ route('contact.store') }}" method="POST">
                @csrf

                {{-- ID del producto si viene desde show --}}
                @isset($producto)
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                @endisset

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input
                        type="text"
                        class="form-control"
                        id="nombre"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea
                        class="form-control"
                        id="mensaje"
                        name="mensaje"
                        rows="5"
                        required>{{ old('mensaje') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Enviar Mensaje
                </button>
            </form>
        </div>
    </div>

    <div class="container d-flex justify-content-center mt-4">
        <a href="https://facebook.com/yourpage" target="_blank" class="text-white mx-2" aria-label="Facebook">
            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
        </a>
        <a href="https://instagram.com/yourpage" target="_blank" class="text-white mx-2" aria-label="Instagram">
            <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
        </a>
        <a href="https://twitter.com/yourpage" target="_blank" class="text-white mx-2" aria-label="Twitter">
            <i class="bi bi-twitter-x" style="font-size: 1.5rem;"></i>
        </a>
    </div>
</div>

