@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0 text-dark">Создание/Редактирование каталога</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-body">
                <form name="users-create-edit"
                      action="@if($model->exists){{route('admin.catalogs.update', $model->id)}}@else{{route('admin.catalogs.store')}}@endif"
                      enctype="multipart/form-data"
                      method="post">
                    @if($model->exists)
                        @method('put')
                    @else
                        @method('post')
                    @endif
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
                            <label for="category_id" class="col-md-4 control-label">Категория</label>
                            <div class="col-md-6">
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Выберите</option>
                                    @foreach($categories as $id => $category)
                                        <option @if($id == $model->category_id) selected @endif value="{{$id}}">{{$category}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <label for="name" class="col-md-4 control-label">Название</label>

                            <div class="col-md-6">
                                <input type="text" id="name" name="name" value="{{$model->name ?? old('name')}}"
                                       class="form-control">
                                @if ($errors->has('name'))
                                    <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="row">
                            <label for="price" class="col-md-4 control-label">Цена</label>
                            <div class="col-md-6">
                                <input type="number" id="price" placeholder="Пример: 2000" name="price" value="{{$model->price ?? old('price')}}"
                                       class="form-control">

                                @if ($errors->has('price'))<span class="text-danger"><strong>{{ $errors->first('price') }}</strong></span>@endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <label for="description" class="col-md-4 control-label">Описание</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control summernote" name="description" rows="2" required>{{ old('description', $model->description) }}</textarea>
                                @if ($errors->has('description'))<span class="text-danger"><strong>{{ $errors->first('description') }}</strong></span>@endif
                            </div>
                        </div>
                    </div>
                    @if($model->exists)
                        <button type="submit" class="btn btn-success">{{trans('Редактировать')}}</button>
                    @else
                        <button type="submit" class="btn btn-success">{{trans('Создать')}}</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

