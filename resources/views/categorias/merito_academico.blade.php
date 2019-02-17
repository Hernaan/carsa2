@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Categoria - Méritos Académicos</h2>
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Certificados de talleres y cursos</th>
                    <th>Finalización de carrera Universitaria</th>
                    <th>Finalización de Especializaciones</th>
                    <!-- <th>Resto de carsanies</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $punto)
                <tr>
                    <td>{{$punto->username}}</td>
                    <td>{{$punto->first_name}}</td>
                    <td>{{$punto->last_name}}</td>
                    <td>{{$punto->meritos_taller_curso}}</td>
                    <td>{{$punto->merito_univ}}</td>
                    <td>{{$punto->merito_espec}}</td>
                    {{--<td>{{$punto->meritos_taller_curso + $punto->merito_univ + $punto->merito_espec}}</td>--}}
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection