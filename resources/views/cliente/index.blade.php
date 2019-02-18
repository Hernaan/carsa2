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
          <h6 class="card-header text-white">PUNTOS TOTALES ACUMULADOS</h6>
          <div class="card-body">
            <p class="card-text">{{$puntos_acumulados[0]->r}} PUNTOS.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">PUNTOS POSITIVOS EN EL MES</h6>
          <div class="card-body">
            <p class="card-text">{{$punto_pos_mes_actual[0]->r}} PUNTOS.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <h6 class="card-header text-white">PUNTOS NEGATIVOS EN EL MES</h6>
          <div class="card-body">
            <p class="card-text">- {{$punto_neg_mes_actual[0]->r}} PUNTOS.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 mb-12">
  
      </div>
      <div class="col-lg-3 mb-3">
        <div class="">
          <div class="">
            <a href="{{url('/extracto')}}" class="btn btn-primary">VER EXTRACTO</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mb-3">
        <div class="">
          <div class="">
            <a href="{{url('/catalogo')}}" class="btn btn-primary">VER CATÁLOGO</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mb-3">
        <div class="">
          <div class="">
            <a href="{{url('/acumula_mas')}}" class="btn btn-primary">¡ACUMULA MÁS!</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 mb-3">
        <div class="">
          <div class="">
            <a href="{{url('/bases')}}" class="btn btn-primary">BASES</a>
          </div>
        </div>
      </div>
    </div>
@endsection