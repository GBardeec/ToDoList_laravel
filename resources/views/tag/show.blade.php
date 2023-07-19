@extends('layouts.main')

@section('content')
    <main>
        <div class="container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{$tag -> id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Название</td>
                                        <td>{{$tag -> title}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
