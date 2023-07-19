@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{route('tasks.update',$tasks->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="w-25">
                            <input type="text" class="form-control mb-3" name="title" placeholder="Название постов"
                                   value="{{$tasks->title}}">
                            @error('title')
                            <div class="text-danger">Поле "Заголовок" необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="w-25">
                            <input type="text" class="form-control mb-3" name="content" value="{{$tasks->content}}">
                            @error('tags')
                            <div class="text-danger">Поле "Контент" необходимо заполнить</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <select name="tag_ids[]" class="select2 select2-hidden-accessible" multiple=""
                                    data-placeholder="Выбрать тэги" style="width: 100%;" data-select2-id="7"
                                    tabindex="-1" aria-hidden="true">
                                @foreach($tags as $tag)
                                    <option{{is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : ''}} value="{{$tag->id}}">{{$tag->title}}"</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="input-group w-50">
                            <label>Выберите изображение</label>
                            <div class="input-group">
                                <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                <input type="file" class="form-control" name="image" id="inputGroupFile01">
                            </div>
                            <p class="text-muted">
                                *Если изображение не будет добавлено повторно, то оно будет удалено.
                            </p>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary mt-3" value="Обновить">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
