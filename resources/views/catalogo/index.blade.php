@extends('layouts.front')
@section('content')
<a href="#" class="btn btn-primary">Credito disponible:<strong>
   {{$puntos_acumulados_disponibles[0]->r}}
</strong></a>
<div class="col-lg-12 mb-12">
  <br>
  @if (Session::has('success'))
       <div class="alert alert-success">{{ Session::get('success') }}</div>
    @elseif (Session::has('warnning'))
        <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
    @endif
  <br>
</div>
<div class="row text-center">
  @foreach($catalogos as $c)
    <div class="col-lg-3 col-md-6 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="{{asset('imagenes/productos/'.$c->image)}}" alt="">
        <div class="card-body">
          <h4 class="card-title">{{$c->name}}</h4>
          <p class="card-text">{{$c->description}}</p>
        </div>
        <div class="card-footer">
          <a data-toggle="modal" data-target="#exampleModal{{$c->id}}" href="#" class="btn btn-primary">Canjear {{$c->price}} carsanies!</a>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$c->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Alerta de confirmación</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="{{url('/canjear_producto')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                  ¿ Estas seguro de que quieres canjear {{$c->name}}?
                  <div class="form-group">
                    <input type="hidden" value="{{$c->id}}" name="id_producto">
                  </div>
                  <div class="form-group">
                    <input type="hidden" value="{{$c->price}}" name="price_producto">
                  </div>
                  <div class="form-group">
                    <input type="hidden" value="{{$puntos_acumulados_disponibles[0]->r}}" name="puntos_acumulados">
                  </div>
                  <div class="form-group">
                    <input type="hidden" value="{{$c->condicion}}" name="condicion">
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                <button type="submit" class="btn btn-primary">SI</button>
              </div>
          </form>
        </div>
      </div>
</div>
  @endforeach
</div>
@endsection