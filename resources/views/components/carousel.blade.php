<div id="pizzaSlider" class="carousel slide mb-2 mb-md-5" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('/images/slider/pizza_01.jpg') }}" class="d-block w-100" alt="{{ __('Best pizza in the world') }}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/images/slider/courier_02.jpg') }}" class="d-block w-100" alt="{{ __('Fastest delivery') }}">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('/images/slider/heart_03.jpg') }}" class="d-block w-100" alt="{{ __('Loyalty program') }}">
        </div>
    </div>
    <a class="carousel-control-prev" href="#pizzaSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#pizzaSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
