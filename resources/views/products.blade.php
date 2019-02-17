@extends('layouts.app')

@section('content')
        <div class="container">

            <div class="panel panel-primary">

             <div class="panel-heading">Import and Export Data Into Excel and CSV in Laravel 5 Using maatwebsite</div>

              <div class="panel-body">    

                   {!! Form::open(array('route' => 'product.import','method'=>'POST','files'=>'true')) !!}
                    <div class="row">
                       <div class="col-xs-10 col-sm-10 col-md-10">
                        @if (Session::has('success'))
                           <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-warnning">{{ Session::get('warnning') }}</div>
                        @endif
                            <div class="form-group">
                                {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
                                <div class="col-md-9">
                                {!! Form::file('products', array('class' => 'form-control')) !!}
                                {!! $errors->first('products', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                        {!! Form::submit('Upload',['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                   {!! Form::close() !!}

                   <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                        <br/><Br/>

                        <a href="{{ route('product.export',['type'=>'xls']) }}" class="btn btn-primary" style="margin-right: 15px;">Download - Excel xls</a>
                        <a href="{{ route('product.export',['type'=>'xlsx']) }}" class="btn btn-primary" style="margin-right: 15px;">Download - Excel xlsx</a>
                        <a href="{{ route('product.export',['type'=>'csv']) }}" class="btn btn-primary" style="margin-right: 15px;">Download - CSV</a>
                        
                        <br/><Br/>
                        <table width="100%" border="1" cellpadding="10">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th width="10%">Price</th>
                            </tr>

                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                            </tr>
                            @endforeach

                        </table>
                       </div>
                   </div>

             </div>

            </div>

            </div>
@endsection
