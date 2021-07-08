@extends('layouts.main')

@section('title', 'Главная Админки')

@section('menu')
@include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>CRUD новостей</h2>
                        @forelse($news as $item)
                            <h3>{{$item->title}}</h3>




                            <form action="{{route('admin.news.destroy', $item)}}" method="post">
                                @csrf
                                @method('DELETE')
                            <a href="{{route('admin.news.edit', $item)}}" class="btn btn-primary">Изменить</a>
                                <input type="submit" class="btn btn-danger" value="удалить">
                            </form>

                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

