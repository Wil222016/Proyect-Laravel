@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Person
@endsection

@section('content')

<!-- Contenido -->
<div class="container">
    <div class="row">
        <div class="row">
            <!-- Imagen del restaurante -->
            <img src="{{ url('storage/img_portada/b10364f9df3b6f780f1ad8195378a9e0.png') }}" alt="image" width="100">
        </div>
        <div class="row mt-2 d-flex align-items-center justify-content-center">
            <!-- Descripción del restaurante -->
            <div class="col-md-12 text-center">
                <h2 class="mb-4">Bienvenido al Restaurante Alquimia</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste
                    natus error sit voluptatem accusantium doloremque laudantium.
                </p>
                <p>
                    Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                </p>
            </div>
        </div>

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../storage/app/public/img_portada/b10364f9df3b6f780f1ad8195378a9e0.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>

<!-- Agregamos el script de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Inicializamos el carrusel con el identificador correcto
    const carousel = new bootstrap.Carousel(document.getElementById('carouselExample'))
</script>

@endsection
