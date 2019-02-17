@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Categoria - Disciplina - BONOS MENSUALES</h2>
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Puntualidad Exelente</th>
                    <th>Ausencias: 0</th>
                    <th>Apercibimientos y Ausencias: 0</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $punto)
                <tr>
                    <td>{{$punto->username}}</td>
                    <td>{{$punto->first_name}}</td>
                    <td>{{$punto->last_name}}</td>
                    <td>{{$punto->be_disc_puntualidad}}</td>
                    <td>{{$punto->be_disc_ausencia}}</td>
                    <td>{{$punto->be_disc_apercib}}</td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection