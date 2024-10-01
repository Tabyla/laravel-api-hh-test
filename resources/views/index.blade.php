@extends('layouts.app')
@section('title', 'Главная')

@section('content')
    <div class="container">
        <h1 class="my-4">Выберите город</h1>

        <div class="letters d-flex overflow-auto border-bottom mb-3">
            @foreach($cities as $letter => $cityGroup)
                <a class="nav-link p-2 letter" href="javascript:void(0);" data-letter="{{ $letter }}">{{ $letter }}</a>
            @endforeach
        </div>

        <div class="row">
            @foreach($cities as $letter => $cityGroup)
                @foreach($cityGroup->chunk(20) as $chunkedCities)
                    <div class="col-md-3 city-list" id="city-list-{{ $letter }}">
                        <ul class="list-unstyled">
                            @foreach($chunkedCities as $city)
                                <li>
                                    <a href="{{ route('city.show', ['alias' => $city->alias]) }}">
                                        {{ $city->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <script src="{{ asset('js/cities.js') }}?v={{ time() }}"></script>
@endsection
