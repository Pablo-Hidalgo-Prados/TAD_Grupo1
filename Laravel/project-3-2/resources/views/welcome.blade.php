@extends('layout')

@section('content')

<section>
    <div id="carouselExampleCaptions" class="carousel slide m-5 rounded-4" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner center">
            <div class="carousel-item active">
                <img src="https://previews.123rf.com/images/leisuretime70/leisuretime701507/leisuretime70150700112/42914693-blanco-palabra-de-bienvenida-en-el-fondo-ex%C3%B3tico-de-color-verde.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-black">Bienvenido a nuestra tienda</h5>
                    <p>¡Aprovecha todo lo que le ofrecemos!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.hola.com/imagenes/cocina/noticiaslibros/20190416140654/productos-ecologicos-biologicos-organicos-saludables/0-669-329/productos-bio-eco-organicos-saludables-t.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Productos</h5>
                    <p>Todos nuestros productos son BIO</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.kolaboo.com/blog/wp-content/uploads/2020/04/mejores-rutas-senderismo-sevilla-1288x724.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Rutas</h5>
                    <p>Nuestras rutas son para todos</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section>

@endsection