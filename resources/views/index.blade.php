@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('painel.create') }}" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>

        {!! Form::open(['route' => 'index', 'method' => 'get']) !!}
            <div class="row filtro" style="margin-top: 30px;">
                <div class="col-sm-5">
                    {{ Form::select('cliente', $clientes, null, ['class' => 'form-control', 'placeholder' => 'Todos clientes']) }}
                </div>

                <div class="col-sm-5">
                    {{ Form::select('status', [1 => 'Abertas', 0 => 'Fechadas'], null, ['class' => 'form-control', 'placeholder' => 'Abertas e fechadas']) }}
                </div>

                <div class="col-sm-2">
                    {!! Form::submit('Buscar', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
        {!! Form::close() !!}

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Data de abertura</th>
                            <th>Data de fechamento</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($servicos as $servico)
                            <tr>
                                <td><a href="{{ route('painel.show', $servico->id) }}">{{ $servico->cliente->nome }}</a></td>

                                <td>{{ with($servico->created_at)->format('d/m/Y H:i:s') }}</td>

                                <td>
                                    @if($servico->data_fechamento == null)
                                        ----------------------------
                                    @else
                                        {{ with($servico->data_fechamento)->format('d/m/Y H:i:s') }}
                                    @endif
                                </td>

                                <td>
                                    @if($servico->data_fechamento == null)
                                        <span class="btn-success" style="padding: 7px; border-radius: 5px;">Aberto</span>
                                    @else
                                        <span class="btn-danger" style="padding: 7px; border-radius: 5px;">Fechado</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">{{ $servicos->appends(Request::except('page'))->links() }}</div>
        </div>
    </div>
@endsection
