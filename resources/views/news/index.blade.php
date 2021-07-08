@extends('layouts.main')

@section('title', 'Все новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h1>все новости</h1>
                        @forelse($news as $item)
                            <h2>{{$item->title}}</h2>
                        <h3>Категория: {{$item->category->title}}</h3>
                            <div class="card-image" style="background-image: url({{$item->image ?? asset('storage/news.jpg')}})">

                            </div>
                            @if (!$item->isPrivate)
                                <a href="{{route('news.show', $item)}}">Подробнее...</a><br>
                            @endif

                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                        {{$news->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


