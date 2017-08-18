@extends('app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Nuevo cosplay</h2>
        </div>
        <div class="col-sm-8">
            <div class="title-action">
                <a href="{{ route('admin.cosplay.index') }}" class="btn btn-danger">Vovler</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <p>Por favor corrige los errores:</p>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Informacion del cosplay</h5></span>
                    </div>

                    <form action="{{ route('admin.cosplay.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="ibox-content">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Estado</label>
                                <select name="status" class="form-control">
                                    <option value="{{ \App\Cosplay::PLANNED }}">{{ \App\Cosplay::PLANNED }}</option>
                                    <option value="{{ \App\Cosplay::IN_PROGRESS }}">{{ \App\Cosplay::IN_PROGRESS }}</option>
                                    <option value="{{ \App\Cosplay::FINISHED }}">{{ \App\Cosplay::FINISHED }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Descripcion</label>
                                <textarea name="description" id="" class="form-control" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="ibox-footer text-right">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection