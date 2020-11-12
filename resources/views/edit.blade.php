@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 col-md-offset-2">
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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Nuevo Empleado</h3>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <form method="POST" action="{{ route('lentes.update',$lentes->id) }}"  role="form" id="regf">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="nombre" pattern="[a-zA-Z ]{2,120}" id="nombre" class="form-control input-sm" value="{{$lentes->nombre}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="codigo" id="codigo" class="form-control input-sm" value="{{$lentes->codigo}}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" maxlength="255" name="descripcion" id="descripcion" class="form-control input-sm" value="{{$lentes->descripcion}}">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="precio" id="precio" class="form-control input-sm" value="{{$lentes->precio}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit"  value="Guardar" class="btn btn-success btn-block">
                                    <a href="{{ route('lentes.index') }}" class="btn btn-info btn-block" >Atrás</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
@endsection