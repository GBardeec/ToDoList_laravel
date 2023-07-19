@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('tag.store')}}" method="post">
                            @csrf
                            <div class="w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название Тега">
                                @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" value="Добавить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
