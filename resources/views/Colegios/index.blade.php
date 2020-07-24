 @extends('layouts.layout')
        @section('content')

            <div class="row">
                <section class="content">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="pull-left"><h3>Colegios</h3></div>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <a href="{{ route('colegio.create') }}" class="btn btn-info" >Añadir Colegio</a>
                                    </div>
                                </div>
                                <div class="table-container">
                                    @if(count($colegios)>0)
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                        @foreach(array_keys($colegios[0]->toArray()) as $atributo)
                                            @if(in_array($atributo, $campos))
                                                <th>{{$atributo}}</th>
                                            @endif

                                        @endforeach
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                        </thead>
                                        <tbody>
                                        @if($colegios->count())
                                            @foreach($colegios as $colegio)


                                                <tr>
                                                    @foreach(array_keys($colegios[0]->toArray()) as $atributo)
                                                        @if(in_array($atributo, $campos))
                                                            <td>{{$colegio->$atributo}}</td>
                                                        @endif
                                                    @endforeach

                                                    <td><a class="btn btn-primary btn-xs" href="{{action('ColegioController@edit', $colegio->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                    <td>
                                                        <form action="{{action('ColegioController@destroy', $colegio->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            <input name="_method" type="hidden" value="DELETE">

                                                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8">No hay colegios</td>
                                            </tr>
                                        @endif
                                        </tbody>

                                    </table>
                                @endif
                                </div>
                            </div>
                            {{ $colegios->links() }}
                        </div>
                    </div>
                </section>

@endsection