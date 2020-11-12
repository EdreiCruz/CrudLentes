@extends('layouts.layout')
@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-body">
                    <div class="pull-left"><h3>Lista de Lentes</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('lentes.create') }}" class="btn btn-info">Añadir registro</a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordered table-striped">
                            <thead>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <td>Vender</td>
                            </thead>
                            <tbody>
                            @if($lentes->count())
                                @foreach($lentes as $lente)
                                    <tr>
                                        <td>{{$lente->codigo}}</td>
                                        <td>{{$lente->nombre}}</td>
                                        <td>{{$lente->descripcion}}</td>
                                        <td>{{$lente->precio}}</td>
                                        <td><a class="btn btn-primary btn-xs" href="{{action('lentesController@edit', $lente->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                        <td>
                                            <form action="{{action('lentesController@destroy', $lente->id)}}" method="post">
                                                {{csrf_field()}}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('venta.store') }}"  role="form" id="regf">
                                                {{csrf_field()}}
                                                <input type="text" value="{{$lente->id}}" hidden id="idlentes" name="idlentes">
                                                <button class="btn btn-success btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">No hay registros</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $lentes->links() }}
            </div>
        </div>
    </div>