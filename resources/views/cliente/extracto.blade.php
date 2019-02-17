@extends('layouts.front')
@section('content')
<style>
  .btn {
    width: 100%;
  }
</style>
<div class="row">
    <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">PUNTOS TOTALES DISPONIBLES</h6>
          <div class="card-body">
            <p class="card-text">{{$puntos_acumulados_disponibles[0]->r}} PUNTOS.</p>
          </div>
        </div>
      </div>
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
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">TRANSFERENCIAS</h6>
          <div class="card-body">
            <p class="card-text">RECIBIDAS: + {{$transferencias_recibidas[0]->r}}</p>
            <p class="card-text">ENVIADAS: - {{$transferencias_enviadas[0]->r}}</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mb-3">
        <div class="">
          <div class="">
            <a href="{{url('/historial')}}" class="btn btn-primary">VER HISTORIAL</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mb-3">
        <div class="">
          <div class="">
            <a href="{{url('/transferencia')}}" class="btn btn-primary">TRANSFERENCIAS</a>
          </div>
        </div>
      </div>
    </div>
@endsection