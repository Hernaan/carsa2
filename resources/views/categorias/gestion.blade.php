@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Categoria - Gestión</h2>
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
                @foreach($puntos as $punto)
              </tbody>
                <tr>
                    <td>{{$punto->username}}</td>
                    <td>{{$punto->first_name}}</td>
                    <td>{{$punto->last_name}}</td>
                    <td>{{$punto->gestion_pos}}</td>
                    <td>{{$punto->gestion_neg}}</td>
                    {{--<td>{{$punto->gestion_pos - $punto->gestion_neg}}</td>--}}
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection