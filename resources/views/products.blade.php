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
                      <td><button class="btn btn-info"><i class="fa fa-camera"></i></button></td>
                      <td>{{$product->name}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->price}}</td>
                      <td>foto.jpg</td>
                  </tr>
                  @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
