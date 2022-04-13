@extends('layout.app')

@section('content')
    <div class="container-sm mt-5" style="width: 30%!important;">
        <main class="form-signin">
            <form>
                <h1 class="h3 mb-3 fw-normal">Вставьте ссылку</h1>

                <div class="form-floating">
                    <input type="text" class="form-control" id="link" placeholder="Ссылка">
                    <label for="id">Ссылка</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Сократить ссылку</button>
            </form>
        </main>
    </div>
@endsection
