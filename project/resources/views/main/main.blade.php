@extends('layout.app')

@section('content')
    <div class="container-sm mt-5" style="width: 30%!important;">
        <main class="form-signin">

            <form method="POST" id="form">
                <h1 class="h3 mb-3 fw-normal">Вставьте ссылку</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="link" name="link" placeholder="Ссылка">
                    <label for="link">Ссылка</label>
                    <span class="hidden"></span>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" id="shortLink">Сократить ссылку</button>
            </form>



            <form class="mt-5 hidden" id="formRedirect" method="GET">
                <div class="form-floating">
                    <input type="text" class="form-control" id="new_link" disabled>
                    <label for="new_link">Ссылка</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" id="buttonRedirect">Перейти</button>
            </form>


        </main>
    </div>
@endsection
