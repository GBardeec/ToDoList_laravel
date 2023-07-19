@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-1 mb-3">
                    <a href="{{route('tag.create')}}" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{$tag -> id}}</td>
                                        <td>{{$tag -> title}}</td>
                                        <td><a class="btn btn-secondary" href="{{route('tag.show', $tag->id)}}">подробнее</a>
                                        </td>
                                        <td><a class="btn btn-success" href="{{route('tag.edit', $tag->id)}}">редактировать</a>
                                        </td>
                                        <td>
                                            <form action="{{route('tag.delete', $tag->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    <i>удалить</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
