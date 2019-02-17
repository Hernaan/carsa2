@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Categoria - Disciplina</h2>
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Puntualidad</th>
                    <th>Llegadas Tardías</th>
                    <th>Omisiones de Maracacíon</th>
                    <th>Ausencias Justificadas</th>
                    <th>Apercibimientos</th>
                    <th>Suspenciones</th>
                    <!-- <th>Total Carsanies</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $punto)
                <tr>
                    <td>{{$punto->first_name}} {{$punto->last_name}}</td>
                    <td>{{$punto->disc_puntualidad_pos}}</td>
                    <td>{{$punto->disc_puntualidad_neg}}</td>
                    <td>{{$punto->disc_marcacion_neg}}</td>
                    <td>{{$punto->disc_ausencia_neg}}</td>
                    <td>{{$punto->disc_apercibimiento_neg}}</td>
                    <td>{{$punto->disc_suspension_neg}}</td>
                    {{-- <td>{{$punto->disc_puntualidad_pos - ($punto->disc_puntualidad_neg + $punto->disc_marcacion_neg + $punto->disc_ausencia_neg + $punto->disc_apercibimiento_neg + $punto->disc_suspension_neg)}}</td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection