@extends('layouts.layout')
@section('content')

    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="pull-left"><h3>{{$nombre}}</h3></div>
                        <div class="pull-right">

                        </div>
                        <div class="table-container">
                            @if(count($clientes)>0)
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                    @foreach(array_keys($clientes[0]->toArray()) as $atributo)
                                        @if(in_array($atributo, $campos))
                                            <th>{{$atributo}}</th>
                                        @endif

                                    @endforeach
                                    <th>Agregar</th>

                                    </thead>
                                    <tbody>
                                    @if($clientes->count())
                                        @foreach($clientes as $cliente)


                                            <tr>
                                                @foreach(array_keys($clientes[0]->toArray()) as $atributo)
                                                    @if(in_array($atributo, $campos))
                                                        <td>{{$cliente->$atributo}}</td>
                                                    @endif

                                                @endforeach

                                                <td>
                                                    <form action="{{action('AlumnoClaseController@store' )}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="id" type="hidden" value={{$cliente->id}}>
                                                        <input name="clase" type="hidden" value={{$id}}>

                                                        <button class="btn btn-primary btn-xs" type="submit"><span class="glyphicon glyphicon-plus"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">No hay clientes</td>
                                        </tr>
                                    @endif
                                    </tbody>

                                </table>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>

@endsection