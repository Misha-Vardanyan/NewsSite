@extends('layouts.main')

@section('title', 'Категории')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @forelse($categories as $category)
                            <a href="{{route('news.category.show', $category['slug']) }}">
                                <h2>{{$category['title']}}</h2>
                            </a>
                        @empty
                            <p>нет категории</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

