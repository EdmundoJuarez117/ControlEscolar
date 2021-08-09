@extends('layouts.app')

@section('content')
@can('admin.carrera.edit')
<div>
<h1>Editar Carrera</h1>
<br>
</div>
<form action="/carrera/{{$c_carrera->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3" >
        <label for="" class="form-label">Nombre</label>
        <input style="width:300px;height:35px" id="nombre" name="nombre" type="text" class="form-control" value="{{$c_carrera->nombre}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre Corto</label>
        <input style="width:300px;height:35px" id="nombre_corto" name="nombre_corto" type="text" class="form-control" value="{{$c_carrera->nombre_corto}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estatus</label>
        <input style="width:200px;height:35px" id="estatus" name="estatus" type="number" class="form-control"  min="0" max="1" value="{{$c_carrera->estatus}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha de Creacion</label>
        <input style="width:200px;height:35px" id="fcreacion" name="fcreacion" type="datetime" class="form-control" value="{{$c_carrera->fcreacion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha de Modificacion</label>
        <input style="width:200px;height:35px" id="fmodificacion" name="fmodificacion" type="datetime" class="form-control" value="{{$c_carrera->fmodificacion}}">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">ID de Modalidad</label>
        <input style="width:200px;height:35px" id="idmodalidad" name="idmodalidad" type="number" class="form-control" min="0"  value="{{$c_carrera->idmodalidad}}">
    </div>
    <a href="\carrera" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
@stop
@endcan
