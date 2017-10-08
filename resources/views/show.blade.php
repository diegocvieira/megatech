@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <a href="{{ route('painel.edit', $servico->id) }}" class="btn btn-primary">Editar</a>

                <a href="#" class="excluir btn btn-danger" onclick="excluir()">Excluir</a>
            </div>

            <div class="col-sm-1 col-sm-offset-9">
                {!! $servico->data_fechamento == null ? '<a href="#" class="btn btn-danger" onclick="alterarStatus()">Fechar</a>' : '<a href="#" class="btn btn-success" onclick="alterarStatus()">Abrir</a>' !!}
            </div>

            {!! Form::open(['route' => ['painel.destroy', $servico->id], 'method' => 'delete', 'id' => 'formExcluir']) !!}
            {!! Form::close() !!}

            {!! Form::open(['route' => ['alterarStatus', $servico->id], 'id' => 'formAlterar']) !!}
                @php $servico->data_fechamento == null ? $valor_status = 1 : $valor_status = 0 @endphp

                {!! Form::input('hidden', 'status', $valor_status) !!}
            {!! Form::close() !!}
        </div>

        <div class="row info">
            <div class="col-sm-12">
                <i class="fa fa-user" aria-hidden="true"></i>
                <b>Cliente</b>
            </div>

            <div class="col-sm-12">
                <span>{!! $servico->cliente->nome !!}</span>
            </div>
        </div>

        <div class="row info">
            <div class="col-sm-12">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <b>Telefone</b>
            </div>

            <div class="col-sm-12">
                <span>{!! $servico->cliente->fone !!}</span>
            </div>
        </div>

        <div class="row info">
            <div class="col-sm-12">
                <i class="fa fa-money" aria-hidden="true"></i>
                <b>Valor</b>
            </div>

            <div class="col-sm-12">
                <span>R$ {!! $servico->valor !!}</span>
            </div>
        </div>

        <div class="row info">
            <div class="col-sm-12">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                <b>Descricao</b>
            </div>

            <div class="col-sm-12">
                <span>{!! $servico->descricao !!}</span>
            </div>
        </div>

        <div class="row info">
            <div class="col-sm-12">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <b>Data de abertura</b>
            </div>

            <div class="col-sm-12">
                <span>{!! with($servico->created_at)->format('d/m/Y H:i:s') !!}</span>
            </div>
        </div>

        @if($servico->data_fechamento != null)
            <div class="row info">
                <div class="col-sm-12">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <b>Data de fechamento</b>
                </div>

                <div class="col-sm-12">
                    <span>{!! with($servico->data_fechamento)->format('d/m/Y H:i:s') !!}</span>
                </div>
            </div>
        @endif
    </div>

    <script>
        function excluir()
        {
            if(confirm('Tem certeza que deseja excluir?') == true)
                document.getElementById('formExcluir').submit();

            else
                return false;
        }

        function alterarStatus()
        {
            document.getElementById('formAlterar').submit();
        }
    </script>
@endsection
