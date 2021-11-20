@extends('layouts.app')
@php
$usuarios = $datos['usuarios'];
$id = isset($usuarios['id']) ? $usuarios['id'] : 0;
$name = $id !== 0 ? $usuarios['name'] : '';
$email = $id !== 0 ? $usuarios['email'] : '';
$password = $id !== 0 ? $usuarios['password'] : 1;
$roles = $datos['usuarioRoles'];
$route = $id > 0 ? "usuarios/$id" : "usuarios/$id/store";
$method = $id > 0 ? 'put' : 'post';

// dd($datos);

@endphp

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-title">
                            <h3 class="text-center">Dashboard Content</h3>

                        </div>
                        <div class="card-subtitle">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>revisar los campos</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- <form action="/store" method="POST">
                                @csrf
                                <button type="submit">guardar</button>
                            </form> --}}
                            {!! Form::open(['route' => $route, 'method' => $method]) !!}
                            <div class="row">
                                <div class="mb-3">
                                    <label for="id" class="form-label">Id</label>
                                    {!! Form::text('id', 'id', ['class' => 'form-control', 'attributes' => 'readonly']) !!}
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">eMail</label>
                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        {!! Form::password('password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">confirmar Password</label>
                                        {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">roles</label>
                                        {!! Form::select('roles[]', $roles, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div> --}}
                                <a href="/usuarios" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">Guardar</button>


                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<div class="container">
    <h2>Crear - Editar</h2>
    <form action=<?= $id > 0 ? '/usuarios/update' : '/usuarios/store' ?>>
        @csrf
        @if ($id > 0)
            @method('PUT')
        @else
            @method('POST')
        @endif
        <div class="mb-3">
            <label for="Id" class="form-label">Id</label>
            <input id="id" name="id" type="text" class="form-control" value="<?= $id ?>" tabindex="0" readonly
                value="<?= $id ?>">
        </div>
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input id="codigo" name="codigo" type="text" class="form-control" value="<?= $name ?>" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control" value="<?= $email ?>"
                tabindex="2">
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control" value="<?= $cantidad ?>"
                tabindex="3">
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" step="any" class="form-control" value="<?= $precio ?>"
                tabindex="4">
        </div>

        <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
</div>
@endsection
