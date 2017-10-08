@extends('layout')

@section('content')
    <div class="container">
        @if(count($errors) > 0)
            <div class="alert alert-danger">Senha incorreta.</div>
        @endif

        {{ Form::model($admin, ['route' => 'admin-update']) }}
            <div class="row" style="margin-top: 30px;">
                <div class="col-sm-3 col-sm-offset-4 form-group">
                    {{ Form::label('username', 'Username', ['class' => 'label-control']) }}
                    {{ Form::input('text', 'username', null, ['class' => 'form-control', 'id' => 'username', 'required']) }}
                </div>

                <div class="col-sm-3 col-sm-offset-4 form-group">
                    {{ Form::label('senha_atual', 'Senha atual', ['class' => 'label-control']) }}
                    {{ Form::input('password', 'senha_atual', null, ['class' => 'form-control', 'id' => 'senha_atual']) }}
                </div>

                <div class="col-sm-3 col-sm-offset-4 form-group">
                    {{ Form::label('senha_nova', 'Nova senha', ['class' => 'label-control']) }}
                    {{ Form::input('password', 'senha_nova', null, ['class' => 'form-control', 'id' => 'senha_nova']) }}
                </div>

                <div class="col-sm-3 col-sm-offset-4 form-group">
                    {{ Form::label('senha_repetir', 'Repetir nova senha', ['class' => 'label-control']) }}
                    {{ Form::input('password', 'senha_repetir', null, ['class' => 'form-control', 'id' => 'senha_repetir']) }}
                </div>

                <div class="col-sm-3 col-sm-offset-4">
                    {{ Form::submit('Salvar', ['class' => 'btn btn-primary form-control']) }}
                </div>
            </div>
        {{ Form::close() }}
    </div>
@endsection
