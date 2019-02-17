@extends('layouts.front')
@section('content')
<div class="row">
  <div class="col-lg-12 mb-12">
    @if (Session::has('success'))
       <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif (Session::has('warnning'))
        <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
    @endif
      <div class="card h-100">
        <h6 class="card-header text-white">DESTINATARIO</h6>
        <div class="card-body">
          <p class="card-text">TOTAL DE CARSANIES: {{$puntos_acumulados[0]->r}} P</p>
          <form action="{{url('/transferencia/enviar')}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="number" name="monto" class="form-control" placeholder="TOTAL A TRANSFERIR" required>
            </div>
            <div class="form-group">
                <input type="number" name="cuenta" class="form-control" placeholder="CUENTA DESTINATARIO" required>
            </div>
                <input type="hidden" name="punto_acumulado" class="form-control" value="{{$puntos_acumulados[0]->r}}" required>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                CONFIRMAR TRANSFERENCIA
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">CONFIRMACION</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ¿ESTA SEGURO DE REALIZAR ESTA OPERACIÓN ?"
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                      <button type="submit" class="btn btn-info">CONFIRMAR TRANSFERENCIA</button>
                    </div>
                  </div>
                </div>
              </div>
            <div class="form-group">
              
            </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection