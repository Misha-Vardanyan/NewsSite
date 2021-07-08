@extends('layouts.main')

@section('title', 'Новость')

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
                            @if (!$news->isPrivate)
                                <h1>{{$news->title}}</h1>
                                <div class="card-image"
                                     style="background-image: url({{$news->image ?? asset('storage/news.jpg')}})">

                                </div>
                                <p>{!! $news->text !!}</p>
                            @else
                                <p>зарегестрируйтесь для просмотра</p>
                            @endif
                        @else
                            <p>Новость не найдена</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


