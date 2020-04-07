<div class="row">
    <div class="col mb-3">
        @foreach($types as $type)
            <a class="btn btn-pizza btn-pill" href="{{ route('home', ['type' => $type->slug]) }}" role="button">
                {{ ucfirst($type->title) }}
            </a>
        @endforeach
    </div>
</div>
