@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Categoria - Gestión - BONOS TRIMESTRALES</h2>
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Gestión Excelente (3 meses)</th>
                    <th>Excelente + Muy buena (3 meses)</th>
                    <th>Gestión Muy Buena</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $punto)
                <tr>
                    <td>{{$punto->username}}</td>
                    <td>{{$punto->first_name}}</td>
                    <td>{{$punto->last_name}}</td>
                    <td>{{$punto->be_gestion_excelente}}</td>
                    <td>{{$punto->be_gestion_exc_buena}}</td>
                    <td>{{$punto->be_gestion_buena}}</td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection