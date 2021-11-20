@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            {{-- <h3 class="page__heading">Usuarios</h3> --}}
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="d-flex justify-content-sm-around p-2 bd-highlight">
                            <div class="card-title">
                                <h3>Usuarios</h3>
                            </div>
                            <div class="card-subtitle">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-warning">Nuevo</a>
                            </div>
                            {{-- <div class="d-grid gap-2">
                                <a href="usuarios.create" class="btn btn-primary">Nuevo</a>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            {{-- table-striped = sombreado intercalado --}}
                            <table class="table table-light table-striped mt-2">
                                <thead style="background-color: #6777ef;">
                                    <th style="display:none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">e-Mail</th>
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($datos['usuarios'] as $usuario)
                                        <tr>
                                            <td style="display:none;">{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>
                                                @if (!empty($usuario->getRoleNames()))
                                                    @foreach ($usuario->getRoleNames() as $rolName)
                                                        <h5><span class="badge badge-dark">{{ $rolName }}</span></h5>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                                    class="btn btn-info">Editar
                                                </a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['usuarios.destroy', $usuario->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                            {{-- <td align="right">
                                                <form action="{{ route('articulos.destroy', $articulo->id) }}"
                                                    method="POST">
                                                    <a href="/articulos/{{ $articulo->id }}/edit"
                                                        class="btn btn-info">Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td> --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination justify-end">
                                {!! $datos['usuarios']->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
