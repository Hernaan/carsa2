@extends('layouts.plantilla')

@section('content')
<div class="card">
  <div class="card-body">
    {!! Form::open(array('route' => 'punto.import','method'=>'POST','files'=>'true')) !!}
            <div class="row">
               <div class="col-xs-10 col-sm-10 col-md-10">
                @if (Session::has('info'))
                   <div class="alert alert-info">{{ Session::get('info') }}
               </div>
                @endif
                @if (Session::has('success'))
                   <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif (Session::has('warnning'))
                    <div class="alert alert-warnning">{{ Session::get('warnning') }}</div>
                @endif
                    <div class="form-group">
                        {!! Form::label('sample_file','Seleccionar archivo a importar:',['class'=>'col-md-3']) !!}
                        <div class="col-md-9">
                        {!! Form::file('puntos', array('class' => 'form-control')) !!}
                        {!! $errors->first('puntos', '<p class="alert alert-danger">:message</p>') !!}
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
@endsection