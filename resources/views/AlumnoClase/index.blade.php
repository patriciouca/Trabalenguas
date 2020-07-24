 @extends('layouts.layout')
        @section('content')

            <div class="row">
                <section class="content">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-left"><h3>Profesor</h3></div>

                                <div class="table-container">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                        @foreach(array_keys($usuarios[0]->toArray()) as $atributo)
                                            @if(in_array($atributo, $campos2))
                                                <th>{{$atributo}}</th>
                                            @endif

                                        @endforeach

                                        </thead>
                                        <tbody>
                                        @if($usuarios->count())
                                            @foreach($usuarios as $usuario)


                                                <tr>
                                                    @foreach(array_keys($usuarios[0]->toArray()) as $atributo)
                                                        @if(in_array($atributo, $campos2))
                                                            <td>{{$usuario->$atributo}}</td>
                                                        @endif

                                                    @endforeach


                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No hay usuarios</td>
                                            </tr>
                                        @endif
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-left"><h3>{{$nombre}}</h3></div>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a href="{{route('crearAlumnoClase',$id)}}" class="btn btn-info" >Añadir Alumno a esta clase</a>
                                    </div>
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

                                        <th>Eliminar</th>
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
                                                        <form action="{{action('AlumnoClaseController@destroy', $cliente->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">
                                                            <input name="clase" type="hidden" value={{$id}}>
                                                            <input name="alumno" type="hidden" value={{$cliente->id}}>
                                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
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