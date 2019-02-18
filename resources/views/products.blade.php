@extends('layouts.plantilla')

@section('content')
<div class="card">
  <div class="card-body">
    {!! Form::open(array('route' => 'product.import','method'=>'POST','files'=>'true')) !!}
      <div class="row">
         <div class="col-xs-10 col-sm-10 col-md-10">
          @if (Session::has('success'))
             <div class="alert alert-success">{{ Session::get('success') }}</div>
          @elseif (Session::has('warnning'))
              <div class="alert alert-warnning">{{ Session::get('warnning') }}</div>
          @endif
              <div class="form-group">
                  {!! Form::label('sample_file','Seleccionar archivo a importar:',['class'=>'col-md-3']) !!}
                  <div class="col-md-9">
                  {!! Form::file('products', array('class' => 'form-control')) !!}
                  {!! $errors->first('products', '<p class="alert alert-danger">:message</p>') !!}
                  </div>
              </div>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 text-center">
          {!! Form::submit('Subir',['class'=>'btn btn-success']) !!}
          </div>
      </div>
     {!! Form::close() !!}
  </div>
</div>

<div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <h2>Productos disponibles para canjear</h2>
        <table id="example" class="display table" style="width:100%">
            <thead>
                <tr>
                    <th>Acciones</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                  <tr>
                      <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$product->id}}">
                          <i class="fa fa-camera"></i>
                        </button>
                        @if($product->condicion == 1)
                        <a href="{{url('/activar_desactivar', $product->id)}}" class="btn btn-danger">
                          <i class="fa fa-toggle-off"></i>
                           Desactivar
                        </a>
                        @else
                        <a href="{{url('/activar_desactivar', $product->id)}}" class="btn btn-success">
                          <i class="fa fa-toggle-on"></i>
                           Activar
                        </a>
                        @endif
                      </td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->price}}</td>
                      <td><img src="{{asset('imagenes/productos/'.$product->image)}}" class="img-responsive" alt="" style="width: 30px;"/></td>
                  </tr>


                  <div class="modal fade" id="exampleModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar imagen al producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{url('/agregarFoto', $product->id)}}" accept="image/jpeg" method="POST" enctype="multipart/form-data">
                      {{Form::token()}}
                      <div class="modal-body">
                        <h2>{{$product->name}}</h2>
                        <input type="file" name="image" class="form-control">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
