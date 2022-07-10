@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Создание характеристики</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-body">
                <form name="users-create-edit"
                      action="{{route('admin.catalogs.storeAttr', $model->id)}}"
                      enctype="multipart/form-data"
                      method="post">
                    @method('post')
                    @csrf
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group mb-3">
                        <div class="row">
                            <label for="type" class="col-md-4 control-label">Тип</label>
                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control">
                                    <option value="">Выберите</option>
                                    @foreach(\App\Models\Attribute::TYPE_LIST as $id => $type)
                                        <option @if($id == $model->type) selected @endif value="{{$id}}">{{$type}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('type'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('type') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label for="value" class="col-md-4 control-label">Значение</label>
                            <div class="col-md-6">
                                <input type="value" id="value" name="value" value="{{$model->value ?? old('value')}}" class="form-control">
                                @if ($errors->has('value'))<span class="text-danger"><strong>{{ $errors->first('value') }}</strong></span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label for="attribute_units_id" class="col-md-4 control-label">Ед. измерение</label>
                            <div class="col-md-6">
                                <select name="attribute_units_id" id="attribute_units_id" class="form-control">
                                    <option value="">Выберите</option>
                                    @foreach($unitList as $id => $unit)
                                        <option @if($id == $model->attribute_units_id) selected @endif value="{{$id}}">{{$unit}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('attribute_units_id'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('attribute_units_id') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">{{trans('Создать')}}</button>
                </form>
            </div>
        </div>
        <table class="table table-bordered table-striped">
                <tbody>
                @foreach($model->attributes as $attribute)
                    <tr>
                        <th>Значение</th><td>{{ $attribute->value }}</td>
                    </tr>
                    <tr>
                        <th>Тип</th><td>{{ \App\Models\Attribute::TYPE_LIST[$attribute->type] }}</td>
                    </tr>
                    <tr>
                        <th>Ед. измерения</th><td>{{ $unitList[$attribute->attribute_units_id] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

