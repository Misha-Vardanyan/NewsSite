@extends('layouts.main')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection


@section('content')

    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Ajax test</h2>
                        <button data-id="ajax" class="send"> Отправить запрос</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let buttons = document.querySelectorAll('.send');
        buttons.forEach((elem)=> {
           elem.addEventListener('click', () => {
               let id = elem.getAttribute('data-id');
               (
                   async () => {
                       const response = await fetch('/admin/ajax', {
                           method: 'POST',
                           headers: {
                               'Content-type': 'application/json;charset=utf-8',
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                           },
                           body: JSON.stringify({
                               id: id,
                           })
                       });
                       const answer = await response.json();

                       console.log(answer.id)


                   }
               ) ();
           })

        });
    </script>
@endsection
