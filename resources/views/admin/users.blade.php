@extends('layouts.main')

@section('title', 'Админка')

@section('menu')

    @include('admin.menu')

@endsection

@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>Пользователи</h2>
                @forelse($users as $user)

                    <div class="card-body">
                        {{$user->name}}
                        @if($user->is_admin)
                            <a href="{{route('admin.toggleAdmin', $user)}}" type="button" class="btn btn-danger">Снять админа</a>
                        @else
                            <a href="{{route('admin.toggleAdmin', $user)}}" type="button" class="btn btn-success">Назначить админом</a>
                        @endif
                    </div>

                @empty
                    <p>Нет пользователей</p>

                @endforelse

            </div>

        </div>
    </div>


@endsection


