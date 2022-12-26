@extends('user.layout.main')

@section('content')
    <!-- Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container">
            <h4 class="mb-5">Hasil Pencarian :</h4>
            <div class="row">
                @forelse ($search as $value)
                    <div class="col-lg-4 col-sm-6">
                        <div class="recipe-item">
                            @if ($value->photo)
                                <a href="{{ route('homepage.show', $value->id) }}">
                                    <img src="{{ $value->photo->getUrl() }}" width="75%" height="320px"
                                        style="display: block; margin: 0 auto;">
                                </a>
                            @else
                                <img src="#" width="75%" height="750%" alt="No Image X"
                                    style="display: block; margin: 0 auto;">
                            @endif
                            <div class="ri-text">
                                <div class="cat-name">{{ ucfirst($value->kategori) }}</div>
                                <a href="{{ route('homepage.show', $value->id) }}">
                                    <h4>{{ $value->nameFood }}</h4>
                                </a>
                                <p style="text-align: justify">{{ substr($value->desc, 0, 30) }} ...</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 col-sm-12">
                        <div class="recipe-item">
                            <h4><span>Yah:( Menu Yang Kamu Cari Kosong!</span></h4>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Recipe Section End -->
@endsection
