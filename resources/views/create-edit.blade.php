@extends('layout')
@section('content')
    <div class="container">
        {!! isset($servico) ? Form::model($servico, ['method' => 'PUT', 'route' => ['painel.update', $servico->id]]) : Form::open(['route' => 'painel.store']) !!}

            <!--Saber se o cliente ja existe ou nao-->
            {!! Form::input('checkbox', 'conferir', null, ['checked', 'style' => 'visibility: hidden']) !!}

            @if(isset($clientes))
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-sm-12">
                        <a href="#" id="tipo_cliente">Cliente cadastrado / Novo cliente</a>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12 form-group">
                    @if(isset($clientes))
                        <div class="nome_cliente" style="display: none;">
                            {!! Form::label('cliente_id', 'Cliente', ['class' => 'control-label']) !!}
                            {{ Form::select('cliente_id', $clientes, null, ['class' => 'form-control', 'id' => 'cliente_id', 'placeholder' => 'Selecione o cliente']) }}
                        </div>
                    @endif

                    <div class="nome_cliente">
                        {!! Form::label('cliente', 'Cliente', ['class' => 'control-label']) !!}
                        {!! Form::input('text', 'nome', $servico->cliente->nome ?? null, ['id' => 'cliente', 'class' => 'form-control', 'placeholder' => 'Nome do cliente']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 form-group nome_cliente">
                    {!! Form::label('fone', 'Telefone', ['class' => 'control-label']) !!}
                    {!! Form::input('text', 'fone', $servico->cliente->fone ?? null, ['id' => 'fone', 'class' => 'form-control', 'placeholder' => '(00) 00000-0000']) !!}
                </div>

                <div class="col-sm-6 form-group">
                    {!! Form::label('valor', 'Valor', ['class' => 'control-label']) !!}
                    {!! Form::input('text', 'valor', null, ['id' => 'valor', 'class' => 'form-control', 'required', 'placeholder' => 'R$ 00,00']) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    {!! Form::label('descricao', 'Descrição', ['class' => 'control-label']) !!}
                    {!! Form::textarea('descricao', null, ['id' => 'descricao', 'class' => 'form-control', 'required', 'placeholder' => 'Informe o problema']) !!}
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('public/js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).on('click', '#tipo_cliente', function()
        {
            $('.nome_cliente').toggle();

            var checkBoxes = $("input[name=conferir");
            checkBoxes.prop("checked", !checkBoxes.prop("checked"));
        });

        $(document).ready(function()
        {
            //Desabilitar select do usuario na tela de editar
            var pagina = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
            if(pagina == 'edit')
                $('#select-user').remove();

            //Validar valor
             $('#valor').mask('000.000.000.000.000,00', {reverse: true});

            //Validar telefone
            $("#fone").mask("(99) 99999-9999");
            $("#fone").on("blur", function()
            {
                var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

                if( last.length == 3 ) {
                    var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
                    var lastfour = move + last;

                    var first = $(this).val().substr( 0, 9 );

                    $(this).val( first + '-' + lastfour );
                }
            });
        });
    </script>
@endpush
