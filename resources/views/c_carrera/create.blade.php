@extends('layouts.app')


@section('content')
@can('admin.carrera.create')
<div>
<h1>Crear Carrera</h1>
<br>
</div>
<form action="/carrera" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input style="width:300px;height:35px" id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Nombre Corto</label>
        <input style="width:300px;height:35px" id="nombre_corto" name="nombre_corto" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Estatus</label>
        <input style="width:200px;height:35px" id="estatus" name="estatus" type="number" class="form-control" tabindex="3"  min="0" max="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha de Creacion</label>
        <input style="width:200px;height:35px" id="fcreacion" name="fcreacion" type="datetime-local" class="form-control" tabindex="4">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha de modificacion</label>
        <input style="width:200px;height:35px" id="fmodificacion" name="fmodificacion" type="datetime-local" class="form-control" tabindex="5">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">ID de Modalidad</label>
        <input style="width:200px;height:35px" id="idmodalidad" name="idmodalidad" type="number" class="form-control" tabindex="6" min="0">
    </div>
    <a href="\carrera" class="btn btn-secondary" tabindex="6">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
@stop
@endcan
