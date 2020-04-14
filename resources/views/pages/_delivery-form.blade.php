
<form method="post" action="{{ route('delivery.store') }}">
    @csrf

    <div class="form-row">
        <div class="form-group col-12">
            <h4 class="mt-3">{{ __('Delivery type') }}</h4>
        </div>
    </div>
    <div class="form-group">
        @foreach($deliveryTypes as $type)
        <div class="form-check form-check-inline @error('type') is-invalid @enderror">
            <input class="form-check-input" type="radio" name="type" value="{{ $type->id }}" {{ old('type') == $type->id ? 'checked' : '' }}>
            <label class="form-check-label">{{ $type->title }}</label>
        </div>
        @endforeach

        @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @guest
    <div class="form-row">
        <div class="form-group col-12">
            <h4 class="mt-3">{{ __('Customer information') }}</h4>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="Name">{{ __('Name') }} *</label>
            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="name" name="first_name" value="{{ old('first_name') }}">

            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="email">{{ __('Email') }} *</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endguest
    <div class="form-row">
        <div class="form-group col-12">
            <h4 class="mt-3">{{ __('Contact information') }}</h4>
        </div>
    </div>
    <div class="form-group">
        <label for="street">{{ __('Street') }} *</label>
        <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street" placeholder="Main St" value="{{ old('street') }}">
        @error('street')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="city">{{ __('City') }}</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-12">
            <h4 class="mt-3">{{ __('Apply promo') }}</h4>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="promo">{{ __('Code') }}</label>
            <input type="text" class="form-control @error('promo') is-invalid @enderror" id="promo" name="promo" value="{{ old('promo') }}">

            @error('promo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Proceed') }}</button>
</form>