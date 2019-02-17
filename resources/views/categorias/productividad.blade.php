@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Categoria - Productividad</h2>
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carsines Positivos</th>
                    <th>Carsines Negativos</th>
                    <!-- <th>Resto de Carsanies</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $punto)
                <tr>
                    <td>{{$punto->username}}</td>
                    <td>{{$punto->first_name}}</td>
                    <td>{{$punto->last_name}}</td>
                    <td>{{$punto->productividad_pos}}</td>
                    <td>{{$punto->productividad_neg}}</td>
                   {{-- <td>{{$punto->productividad_pos - $punto->productividad_neg}}</td>--}}
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection