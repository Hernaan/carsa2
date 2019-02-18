@extends('layouts.front')
@section('content')
<style>
  .btn {
    width: 100%;
  }
  .blanco {
    background-color: white;
  }
  body{ text-align: center }
  #visor_imagenes {
  text-align: center;
  }

  .blanco-rojo {
    color: black;
    background-color: white;
  }
</style>
<h2 id='visor_imagenes'><span class="blanco-rojo">{{$nombre_mes}}</span></h2>
<div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">GUARANIES TOTALES ACUMULADOS</h6>
          <div class="card-body">
            <p class="card-text">{{$puntos_acumulados[0]->r}} PUNTOS.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">DISCIPLINA</h6>
          <div class="card-body">
            <p class="card-text"> PUNTUALIDAD: {{$puntualidad[0]->r}}</p>
            <p class="card-text"> LLEGADAS TARDIAS: -{{$llegadas_tardias[0]->r}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">PRODUCTIVIDAD</h6>
          <div class="card-body">
            <p class="card-text">{{$productividad[0]->r}} PUNTOS.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">BONO MENSUAL</h6>
          <div class="card-body">
            <p class="card-text">0 AUSENCIAS: {{$bono_mensual_ausencia[0]->r}}</p>
            <p class="card-text">0 APERCIBIMIENTOS Y SUSP: {{$bono_mensual_apercibimiento[0]->r}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 mb-12">
        <div class="card h-100">
          <h6 class="card-header text-white">TRANSFERENCIAS</h6>
          <div class="card-body">
            @foreach($tranferencia_recibidas as $recib)

              <p class="card-text"> <b class="text-success">Transferecia recibida: </b>{{date('d-m-Y', strtotime($recib->created_at))}} por {{$recib->user}} el monto de {{$recib->puntos}} carsanies</p>
              
            @endforeach

            @foreach($tranferencia_realizadas as $reali)
              <p class="card-text"><b class="text-danger">Transferecia realizada: </b>A beneficio de {{$reali->user}}: Realizado el {{date('d-m-Y', strtotime($reali->created_at))}}  por el monto de {{$reali->puntos}} carsanies</p>
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-12 mb-12">
    <!-- cumple la funcion de un <br> o <hr> -->
      </div>
      <hr>
      <div class="col-lg-12 mb-12">
        <div class="card h-100">
          <h6 class="card-header text-white">COMPRAS REALIZADAS</h6>
          <div class="card-body">
            @foreach($compras_realizadas as $compro)
              <p class="card-text"> <b class="text-success">Compra realizada: </b>{{date('d-m-Y', strtotime($compro->created_at))}} por {{$compro->user}} el monto de {{$compro->monto_canjeo}} carsanies el producto {{$compro->product_name}}</p>
              
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-lg-12 mb-12">
    <!-- cumple la funcion de un <br> o <hr> -->
      </div>
      <hr>
    </div>
@endsection