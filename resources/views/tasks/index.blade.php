@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="container-fluid">
                <div class="row mb-3">
                    <form action="{{route('tasks.index')}}" id="myForm" method="get">
                        @csrf
                        <div>
                            Выберите тэги для фильтрации
                            <select class="form-select w-25" multiple aria-label="multiple select example"
                                    name="tags[]">
                                @foreach($tags as $tag)
                                    <option
                                        {{ request('tags') && in_array($tag->id, request('tags')) ? 'selected' : '' }} value="{{ $tag->title }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary mb-2" type="submit">
                                отфильтровать
                            </button>
                            <button class="btn btn-primary mb-2" href="{{route('tasks.index')}}">
                                сбросить фильтр
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-1 mb-3">
                    <a href="{{route('tasks.create')}}" class="btn btn-block btn-primary">Добавить</a>
                </div>
            </div>

            <div class="row ml-3">
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
                                <tbody class="align-middle">
                                @foreach($tasks as $task)
                                    <tr>
                                        <td>{{$task -> id}}</td>
                                        <td>{{$task -> title}}</td>
                                        <td><a class="btn btn-secondary"
                                               href="{{route('tasks.show', $task -> id)}}">подробнее</a>
                                        </td>
                                        <td><a href="{{route('tasks.edit', $task -> id)}}"
                                               class="btn btn-success">редактировать</a></td>
                                        <td>
                                            <form action="{{route('tasks.delete', $task->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">
                                                    удалить
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
