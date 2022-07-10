@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Каталоги</h3>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" href="{{route('admin.catalogs.create')}}">Добавить</a>
        <div class="card card-default">
            <div class="card-body">
                <table class="table">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Название</th>
                        <th>Категория</th>
                        <th>Цена</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->category->name ?? ''}}</td>
                            <td>{{$item->price}}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{route('admin.catalogs.createAttr', $item->id)}}">Добавить хар-ки</a>
                                <a class="btn btn-sm btn-primary" href="{{route('admin.catalogs.edit', $item->id)}}">Редактировать</a>
                                <form style="display:inline;" method="POST" action="{{ route('admin.catalogs.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-10">
            <div class="form-group">
                {{ $models->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
@endsection
