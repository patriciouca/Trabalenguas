 @extends('layouts.layout')
        @section('content')
            <div class="row">
                <section class="content">
                    <div class="col-md-8 col-md-offset-2">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Revise los campos obligatorios.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-info">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h3 class="panel-title">Editar {{$nombre}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-container">
                                    <!--<form method="PUT" action=" route('clases_impartida.update',$clases_impartida->id)" >-->
                                    <form method="POST" action="{{ route('clases_impartida.update',$clases_impartida->id) }}"  role="form">
                                        @method('PATCH')
                                        @include('Clases_Impartidas/form', ['clases_impartida' => $clases_impartida])
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </section>

@endsection