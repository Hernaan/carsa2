@extends('layouts.plantilla')
@section('content')
<div class="card">
    <div class="card-body">
        <table id="example" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre de usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puntos as $punto)
                <tr>
                    <td>{{$punto->username}}</td>
                    <td>{{$punto->first_name}}</td>
                    <td>{{$punto->last_name}}</td>
                </tr>
                @endforeach
            </tfoot>
        </table>

    </div>
</div>
@endsection