@extends('layouts.app')


@section('content')
@can('admin.modalidad.create')
<div>
<h1>Crear Modalidades de Carrera</h1>
<br>
</div>
<form action="/modalidad" method="POST">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nombre</label>
        <input style="width:300px;height:35px" id="nombre" name="nombre" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha de Creacion</label>
        <input style="width:200px;height:35px" id="fcreacion" name="fcreacion" type="datetime-local" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha de modificacion</label>
        <input style="width:200px;height:35px" id="fmodificacion" name="fmodificacion" type="datetime-local" class="form-control" tabindex="3">
    </div>
    <a href="\modalidad" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
@stop
@endcan
