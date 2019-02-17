@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Categoria - Productividad - BONOS TRIMESTRALES</h2>
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Verde Flúor (3 meses)</th>
                    <th>Verde + Flúor: (3 meses)</th>
                    <th>Verde (3 meses)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $punto)
                <tr>
                    <td>{{$punto->username}}</td>
                    <td>{{$punto->first_name}}</td>
                    <td>{{$punto->last_name}}</td>
                    <td>{{$punto->be_prod_fluor}}</td>
                    <td>{{$punto->be_prod_fluor_verde}}</td>
                    <td>{{$punto->be_prod_verde}}</td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection