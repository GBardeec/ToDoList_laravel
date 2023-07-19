@extends('layouts.main')

@section('content')
    <section class="container">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>Id</td>
                                    <td>{{$tasks->id}}</td>
                                </tr>
                                <tr>
                                    <td>Название</td>
                                    <td>{{$tasks->title}}</td>
                                </tr>
                                <tr>
                                    <td>Описание</td>
                                    <td>{{$tasks->content}}</td>
                                </tr>
                                <tr>
                                    <td>Тэги</td>
                                    <td>
                                        @foreach($tasks->tags->whereIn('id', $tasks->tags->pluck('id')->toArray()) as $tag)
                                            {{ $tag->title }},
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>Изображение</td>
                                    <td>
                                        @if($tasks->image == null)
                                            <i>изображение отсутствует</i>
                                        @else
                                            <a href="{{ url('storage/' . $tasks->image) }}" target="_blank">
                                                <img width="150" height="150"
                                                     src="{{ url('storage/' . $tasks->image) }}" alt="">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
