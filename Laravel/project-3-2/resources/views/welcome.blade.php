@extends('layout')

@section('content')
    <section>
        <div class="m-lg-5">
            <div class="m-lg-5">
                <div class="m-lg-5">
                    <div id="carouselExampleCaptions" class="carousel carousel-dark slide m-3 m-sm-5 m-md-5 rounded-4" data-bs-ride="false">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner center rounded-5">
                            <div class="carousel-item active">
                                <img src="/images/welcome.jpg" class="d-block w-100" alt="...">
                                <div class="carousel-caption bg-success bg-opacity-75 rounded-4">
                                    <h5 class="text-black">Bienvenido a nuestra tienda</h5>
                                    <p>¡Aproveche todo lo que le ofrecemos!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://images.hola.com/imagenes/cocina/noticiaslibros/20190416140654/productos-ecologicos-biologicos-organicos-saludables/0-669-329/productos-bio-eco-organicos-saludables-t.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block bg-success bg-opacity-75 rounded-4">
                                    <h5 class="text-black">Productos</h5>
                                    <p>Todos nuestros productos son BIO</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.kolaboo.com/blog/wp-content/uploads/2020/04/mejores-rutas-senderismo-sevilla-1288x724.jpg"
                                    class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block bg-success bg-opacity-75 rounded-4">
                                    <h5 class="text-black">Rutas</h5>
                                    <p>Nuestras rutas son para todos</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Siguiente</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
