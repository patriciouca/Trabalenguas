 @extends('layouts.layout')
        @section('content')

            <div class="row">
                <section class="content">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-left"><h3>Clases_Impartidas</h3></div>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a href="{{ route('clases_impartida.create') }}" class="btn btn-info" >Añadir Clases_Impartida</a>
                                    </div>
                                </div>
                                <div class="table-container">
                                    @if(count($clases_impartidas)>0)
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                        @foreach(array_keys($clases_impartidas[0]->toArray()) as $atributo)
                                            @if(in_array($atributo, $campos))
                                                <th>{{$atributo}}</th>
                                            @endif

                                        @endforeach
                                        <th>Ver</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        </thead>
                                        <tbody>
                                        @if($clases_impartidas->count())
                                            @foreach($clases_impartidas as $clases_impartida)


                                                <tr>
                                                    @foreach(array_keys($clases_impartidas[0]->toArray()) as $atributo)
                                                        @if(in_array($atributo, $campos))

                                                            <td>{{$clases_impartida->$atributo}}</td>
                                                        @endif
                                                    @endforeach

                                                        <td><a class="btn btn-primary btn-xs" href="{{action('AlumnoClaseController@verClase',$clases_impartida->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a></td>

                                                    <td><a class="btn btn-primary btn-xs" href="{{action('ClasesImpartidasController@edit', $clases_impartida->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td>
                                                        <form action="{{action('ClasesImpartidasController@destroy', $clases_impartida->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">

                                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No hay clases_impartidas</td>
                                            </tr>
                                        @endif
                                        </tbody>

                                    </table>
                                @endif
                                </div>
                            </div>
                            {{ $clases_impartidas->links() }}
                        </div>
                    </div>
                </section>

@endsection