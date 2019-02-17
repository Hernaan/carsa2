@extends('layouts.app')

@section('content')
<div class="container">

    <div class="panel panel-primary">

     <div class="panel-heading">Importar datos en Excel o en CSV</div>

      <div class="panel-body">    

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

    <div class="panel panel-primary">

     <div class="panel-heading">Categoria - Disciplina</div>

      <div class="panel-body">    
           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                <br/><Br/>

                <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                <br/><Br/>
                <div class="table-responsive">
                    <table width="100%" border="1" cellpadding="10" class="table">
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Puntualidad</th>
                            <th>Llegadas Tardías</th>
                            <th>Omisiones de Maracacíon</th>
                            <th>Ausencias Justificadas</th>
                            <th>Apercibimientos</th>
                            <th>Suspenciones</th>
                            <th>Total Carsanies</th>
                        </tr>
                        @foreach($puntos as $punto)
                        <tr>
                            <td>{{$punto->username}}</td>
                            <td>{{$punto->first_name}}</td>
                            <td>{{$punto->last_name}}</td>
                            <td>{{$punto->disc_puntualidad_pos}}</td>
                            <td>{{$punto->disc_puntualidad_neg}}</td>
                            <td>{{$punto->disc_marcacion_neg}}</td>
                            <td>{{$punto->disc_ausencia_neg}}</td>
                            <td>{{$punto->disc_apercibimiento_neg}}</td>
                            <td>{{$punto->disc_suspension_neg}}</td>
                            <td>{{$punto->disc_puntualidad_pos - ($punto->disc_puntualidad_neg + $punto->disc_marcacion_neg + $punto->disc_ausencia_neg + $punto->disc_apercibimiento_neg + $punto->disc_suspension_neg)}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
               </div>
           </div>



     </div>

    </div>
<!-- ------------------------- -->
    <div class="panel panel-primary">

     <div class="panel-heading">Categoria - Productividad</div>

      <div class="panel-body">    
           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                <br/><Br/>

                <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                <br/><Br/>
                <div class="table-responsive">
                    <table width="100%" border="1" cellpadding="10" class="table">
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Carsines Positivos</th>
                            <th>Carsines Negativos</th>
                            <th>Resto de Carsanies</th>
                        </tr>
                        @foreach($puntos as $punto)
                        <tr>
                            <td>{{$punto->username}}</td>
                            <td>{{$punto->first_name}}</td>
                            <td>{{$punto->last_name}}</td>
                            <td>{{$punto->productividad_pos}}</td>
                            <td>{{$punto->productividad_neg}}</td>
                            <td>{{$punto->productividad_pos - $punto->productividad_neg}}</td>
                        </tr> 
                        @endforeach
                    </table>
                </div>
               </div>
           </div>



     </div>

    </div>
<!-- ---------------------------- -->

    <div class="panel panel-primary">

     <div class="panel-heading">Categoria - Gestion</div>
      <div class="panel-body">    
           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                <br/><Br/>
                <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                <br/><Br/>
                <div class="table-responsive">
                    <table width="100%" border="1" cellpadding="10" class="table">
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Carsines Positivos</th>
                            <th>Carsines Negativos</th>
                            <th>Resto de Carsanies</th>
                        </tr>
                        @foreach($puntos as $punto)
                        <tr>
                            <td>{{$punto->username}}</td>
                            <td>{{$punto->first_name}}</td>
                            <td>{{$punto->last_name}}</td>
                            <td>{{$punto->gestion_pos}}</td>
                            <td>{{$punto->gestion_neg}}</td>
                            <td>{{$punto->gestion_pos - $punto->gestion_neg}}</td>
                        </tr> 
                        @endforeach
                    </table>
                </div>
               </div>
           </div>
     </div>
    </div>
<!-- -------------------------------- -->
    <div class="panel panel-primary">

         <div class="panel-heading">Categoria - Méritos Académicos</div>
          <div class="panel-body">    
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <br/><Br/>
                    <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                    <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                    <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                    <br/><Br/>
                    <div class="table-responsive">
                        <table width="100%" border="1" cellpadding="10" class="table">
                            <tr>
                                <th>Nombre de usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Certificados de talleres y cursos</th>
                                <th>Finalización de carrera Universitaria</th>
                                <th>Finalización de Especializaciones</th>
                                <th>Resto de carsanies</th>
                            </tr>
                            @foreach($puntos as $punto)
                            <tr>
                                <td>{{$punto->username}}</td>
                                <td>{{$punto->first_name}}</td>
                                <td>{{$punto->last_name}}</td>
                                <td>{{$punto->meritos_taller_curso}}</td>
                                <td>{{$punto->merito_univ}}</td>
                                <td>{{$punto->merito_espec}}</td>
                                <td>{{$punto->meritos_taller_curso + $punto->merito_univ + $punto->merito_espec}}</td>
                            </tr> 
                            @endforeach
                        </table>
                    </div>
                   </div>
               </div>
         </div>
    </div>
    <!-- ------------------------------ -->
    <div class="panel panel-primary">

         <div class="panel-heading">Categoria - Disciplina - BONOS MENSUALES</div>
          <div class="panel-body">    
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <br/><Br/>
                    <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                    <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                    <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                    <br/><Br/>
                    <div class="table-responsive">
                        <table width="100%" border="1" cellpadding="10" class="table">
                            <tr>
                                <th>Nombre de usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Puntualidad Exelente</th>
                                <th>Ausencias: 0</th>
                                <th>Apercibimientos y Ausencias: 0</th>
                            </tr>
                            @foreach($puntos as $punto)
                            <tr>
                                <td>{{$punto->username}}</td>
                                <td>{{$punto->first_name}}</td>
                                <td>{{$punto->last_name}}</td>
                                <td>{{$punto->be_disc_puntualidad}}</td>
                                <td>{{$punto->be_disc_ausencia}}</td>
                                <td>{{$punto->be_disc_apercib}}</td>
                            </tr> 
                            @endforeach
                        </table>
                    </div>
                   </div>
               </div>
         </div>
    </div>
    <!-- ------------------------------ -->
    <div class="panel panel-primary">

         <div class="panel-heading">Categoria - Disciplina - BONOS MENSUALES</div>
          <div class="panel-body">    
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <br/><Br/>
                    <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                    <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                    <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                    <br/><Br/>
                    <div class="table-responsive">
                        <table width="100%" border="1" cellpadding="10" class="table">
                            <tr>
                                <th>Nombre de usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Puntualidad Exelente</th>
                                <th>Ausencias: 0</th>
                                <th>Apercibimientos y Ausencias: 0</th>
                            </tr>
                            @foreach($puntos as $punto)
                            <tr>
                                <td>{{$punto->username}}</td>
                                <td>{{$punto->first_name}}</td>
                                <td>{{$punto->last_name}}</td>
                                <td>{{$punto->be_disc_puntualidad}}</td>
                                <td>{{$punto->be_disc_ausencia}}</td>
                                <td>{{$punto->be_disc_apercib}}</td>
                            </tr> 
                            @endforeach
                        </table>
                    </div>
                   </div>
               </div>
         </div>
    </div>
    <!-- -------------------------------- -->
    <div class="panel panel-primary">

         <div class="panel-heading">Categoria - Productividad - BONOS TRIMESTRALES</div>
          <div class="panel-body">    
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <br/><Br/>
                    <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                    <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                    <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                    <br/><Br/>
                    <div class="table-responsive">
                        <table width="100%" border="1" cellpadding="10" class="table">
                            <tr>
                                <th>Nombre de usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Verde Flúor (3 meses)</th>
                                <th>Verde + Flúor: (3 meses)</th>
                                <th>Verde (3 meses)</th>
                            </tr>
                            @foreach($puntos as $punto)
                            <tr>
                                <td>{{$punto->username}}</td>
                                <td>{{$punto->first_name}}</td>
                                <td>{{$punto->last_name}}</td>
                                <td>{{$punto->be_prod_fluor}}</td>
                                <td>{{$punto->be_prod_fluor_verde}}</td>
                                <td>{{$punto->be_prod_verde}}</td>
                            </tr> 
                            @endforeach
                        </table>
                    <div class="table-responsive">
                   </div>
               </div>
         </div>
    </div>
    <!-- ------------------------------ -->
    <div class="panel panel-primary">

         <div class="panel-heading">Categoria - Gestión - BONOS TRIMESTRALES</div>
          <div class="panel-body">    
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                    <br/><Br/>
                    <a href="{{ route('punto.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xls</a>
                    <a href="{{ route('punto.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - Excel xlsx</a>
                    <a href="{{ route('punto.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Descargar - CSV</a>
                    <br/><Br/>
                    <div class="table-responsive">
                        <table width="100%" border="1" cellpadding="10" class="table">
                            <tr>
                                <th>Nombre de usuario</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Gestión Excelente (3 meses)</th>
                                <th>Excelente + Muy buena (3 meses)</th>
                                <th>Gestión Muy Buena</th>
                            </tr>
                            @foreach($puntos as $punto)
                            <tr>
                                <td>{{$punto->username}}</td>
                                <td>{{$punto->first_name}}</td>
                                <td>{{$punto->last_name}}</td>
                                <td>{{$punto->be_gestion_excelente}}</td>
                                <td>{{$punto->be_gestion_exc_buena}}</td>
                                <td>{{$punto->be_gestion_buena}}</td>
                            </tr> 
                            @endforeach
                        </table>
                    </div>
                   </div>
               </div>
         </div>
    </div>

</div>
</div>
@endsection