@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                <th>Заказ№</th><td>{{ $model->id }}</td>
            </tr>
            <tr>
                <th>Статус</th><td>{{\App\Models\Order::STATUS_LIST[$model->status]}}</td>
            </tr>
            <tr>
                <th>Клиент</th><td>{{ $model->fullUsername }}</td>
            </tr>
            <tr>
                <th>Товары</th>
                <td>
                @foreach($model->catalogs as $catalog)
                        {!! $catalog->name . '<br>' !!}
                @endforeach
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
