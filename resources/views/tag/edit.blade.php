@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('tag.update',$tag->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="w-25">
                                <input type="text" class="form-control" name="title" placeholder="Название тега"
                                       value="{{$tag->title}}">
                                @error('title')
                                <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary mt-3" value="Редактировать">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
