@extends('layouts.front')
@section('content')
<style>
  .btn {
    width: 100%;
  }
</style>
<div class="row">
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 01)}}" class="btn btn-primary">ENERO</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 02)}}" class="btn btn-primary">FREBRERO</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 03)}}" class="btn btn-primary">MARZO</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 04)}}" class="btn btn-primary">ABRIL</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 05)}}" class="btn btn-primary">MAYO</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 06)}}" class="btn btn-primary">JUNIO</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 07)}}" class="btn btn-primary">JULIO</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 8)}}" class="btn btn-primary">AGOSTO</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 9)}}" class="btn btn-primary">SEPTIEMBRE</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 10)}}" class="btn btn-primary">OCTUBRE</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 11)}}" class="btn btn-primary">NOVIEMBRE</a>
      </div>
    </div>
  </div>
  <div class="col-lg-3 mb-3">
    <div class="">
      <div class="">
        <a href="{{url('/historial_mes', 12)}}" class="btn btn-primary">DICIEMBRE</a>
      </div>
    </div>
  </div>
</div>
@endsection