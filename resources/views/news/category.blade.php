@extends('layouts.main')

@section('title', 'Категория')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if ($news)
                            <h1>Новости категории {{$category}}</h1>
                            @forelse($news as $item)
                                <h2>{{$item['title']}}</h2>
                                @if (!$item['isPrivate'])
                                    <a href="{{route('news.show', $item['id'])}}">Подробнее...</a><br>
                                @endif

                            @empty
                                <p>Нет новостей</p>
                            @endforelse
                        @else
                            <p>нет новостей такой категории</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

