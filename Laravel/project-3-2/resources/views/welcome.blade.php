@extends('layout')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<section>
    <div class="m-lg-5">
        <div class="m-lg-5">
            <div class="m-lg-5">
                <div id="carouselExampleCaptions" class="carousel carousel-dark slide m-3 m-sm-5 m-md-5 rounded-4" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner center rounded-5">
                        <div class="carousel-item active">
                            <img src="/images/welcome.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption bg-success bg-opacity-75 rounded-4">
                                <h5 class="text-black">@lang('messages.welcome_slide_1_1')</h5>
                                <p>@lang('messages.welcome_slide_1_2')</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/welcome2.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-md-block bg-success bg-opacity-75 rounded-4">
                                <h5 class="text-black">@lang('messages.welcome_slide_2_1')</h5>
                                <p>@lang('messages.welcome_slide_2_2')</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/images/welcome3.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-md-block bg-success bg-opacity-75 rounded-4">
                                <h5 class="text-black">@lang('messages.welcome_slide_3_1')</h5>
                                <p>@lang('messages.welcome_slide_3_2')</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">@lang('messages.welcome_slide_ctrl_1')</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">@lang('messages.welcome_slide_ctrl_2')</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection